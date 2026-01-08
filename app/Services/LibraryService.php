<?php

namespace App\Services;

use App\Models\BookItemModel;
use App\Models\BookModel;
use App\Models\LoanModel;
use App\Models\PublisherModel;
use App\Models\SectorModel;
use App\Repositories\LibraryRepository;
use App\Repositories\SectorRepository;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LibraryService
{
    protected LibraryRepository $libraryRepository;

    public function __construct(LibraryRepository $libraryRepository)
    {
        $this->libraryRepository = $libraryRepository;
    }

    public function getAllBooks(): Collection
    {
        return BookModel::all();
    }

    public function getAllPublishers(): Collection
    {
        return PublisherModel::all();
    }

    public function getById(int $id): ?LibraryRepository
    {
        return $this->libraryRepository->find($id);
    }

    public function createPublisher(array $data): PublisherModel
    {
        $publisher = new PublisherModel();
        $publisher->author_id = Auth::user()->id;
        $publisher->name = $data['name'];
        $publisher->email = $data['email'];
        $publisher->phone = $data['phone'];
        $publisher->website = $data['website'];

        return $this->libraryRepository->savePublisher($publisher);
    }

    public function createBook(array $data): BookModel
    {
        $book = new BookModel();
        $book->author_id = Auth::user()->id;
        $book->publisher_id = $data['publisher_id'];
        $book->title = $data['title'];
        $book->author = $data['author'];
        $book->publication_year = $data['publication_year'];
        $book->isbn = $data['isbn'];
        $book->copies = $data['copies'];


        return $this->libraryRepository->saveBook($book);
    }

    public function showBook(int $id): ?BookModel
    {
        return BookModel::find($id);
    }

    public function getBookItems(int $bookId): Collection
    {
        // Busca todos os itens do livro
        return BookItemModel::where('book_id', $bookId)->get();
    }

    public function getAllBookItems(): Collection
    {
        // Busca todos os itens do livro
        return BookItemModel::all();
    }

    public function updateBookItemStatus(int $id, int|string $status): ?BookItemModel
    {
        $bookItem = BookItemModel::find($id);
        if ($bookItem) {
            $bookItem->status = $status;
            $bookItem->save();
        }
        return $bookItem;
    }

    public function getAllLoans(): Collection
    {
        // Busca todos os itens do livro
        return DB::table('loans')
            ->leftJoin('users', 'loans.user_id', '=', 'users.id')
            ->leftJoin('book_items', 'loans.book_item_id', '=', 'book_items.id')
            ->leftJoin('books', 'book_items.book_id', '=', 'books.id')
            ->select(
                'loans.*',
                'users.name as user_name',
                'books.title as book_title',
                DB::raw('DATEDIFF(loans.due_date, CURDATE()) as days_diff')
            )
            ->get();
    }


    public function createLoan(array $data): LoanModel
    {
        $loan = new LoanModel();
        $loan->author_id = Auth::id();
        $loan->user_id = $data['user_id'];
        $loan->book_item_id = $data['book_item_id'];
        $loan->loan_date = $data['loan_date'];
        $loan->due_date = $data['due_date'];
        $loan->return_date = $data['return_date'];
        $loan->status = $data['status']; // aqui já vem como 1

        return $this->libraryRepository->saveLoan($loan);
    }



    public function searchBooks($request)
    {
        $bookItems = BookItemModel::select(
            'book_items.id as item_id',
            'books.id as book_id',
            'books.title as book_title',
            'books.author',
            'books.isbn',
            'publishers.name as publisher',
            'book_items.status',
            'book_items.code_system'
        )
            ->join('books', 'book_items.book_id', '=', 'books.id')
            ->join('publishers', 'books.publisher_id', '=', 'publishers.id');

        if ($request->filled('title')) {
            $bookItems->where('books.title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('author')) {
            $bookItems->where('books.author', 'like', '%' . $request->author . '%');
        }

        if ($request->filled('code_system')) {
            $bookItems->where('book_items.code_system', 'like', '%' . $request->code_system . '%');
        }

        $bookItems = $bookItems->orderBy('books.title', 'asc')->get();

        return $bookItems;
    }

    public function getLoansToday()
    {
        return DB::table('loans as l')
            ->join('students as s', 's.user_id', '=', 'l.user_id')
            ->join('users as u', 'u.id', '=', 's.author_id')
            ->join('book_items as bk', 'bk.id', '=', 'l.book_item_id')
            ->join('books as b', 'b.id', '=', 'bk.book_id')
            ->join('publishers as p', 'p.id', '=', 'b.publisher_id')
            ->whereDate('l.loan_date', '=', Carbon::today())
            ->select(
                's.full_name as student_name',
                's.cpf',
                's.user_id as student_user_id', // <-- pega o id do aluno
                'u.name as author_name',
                'u.email as author_email',
                'b.title',
                'p.name as publisher_name'
            )
            ->get();
    }


    public function getLoansTodayCount(): int
    {
        return DB::table('loans')
            ->whereDate('loans.loan_date', '=', Carbon::today())
            ->count();
    }

    public function getReturnsToday()
    {
        return DB::table('loans as l')
            ->join('students as s', 's.user_id', '=', 'l.user_id')
            ->join('users as u', 'u.id', '=', 's.author_id')
            ->join('book_items as bk', 'bk.id', '=', 'l.book_item_id')
            ->join('books as b', 'b.id', '=', 'bk.book_id')
            ->join('publishers as p', 'p.id', '=', 'b.publisher_id')
            ->whereDate('l.return_date', '=', Carbon::today())
            ->select(
                's.full_name as student_name',
                's.cpf',
                's.user_id as student_user_id', // <-- precisa estar aqui
                'u.name as author_name',
                'u.email as author_email',
                'b.title',
                'p.name as publisher_name'
            )
            ->get();
    }



    public function getReturnsTodayCount(): int
    {
        return DB::table('loans')
            ->whereDate('loans.return_date', '=', Carbon::today())
            ->count();
    }

    public function getLoanById($id)
    {
        return DB::table('loans')
            ->leftJoin('students', 'students.user_id', '=', 'loans.user_id')
            ->leftJoin('book_items', 'book_items.id', '=', 'loans.book_item_id')
            ->leftJoin('books', 'books.id', '=', 'book_items.book_id')
            ->leftJoin('publishers', 'publishers.id', '=', 'books.publisher_id')
            ->select(
                'loans.*',
                'students.full_name as student_name',
                'students.cpf',
                'students.rg',
                'books.title as book_title',
                'book_items.code_system as book_code_system',
                'publishers.name as publisher_name'
            )
            ->where('loans.id', $id)
            ->first();
    }

    public function returnLoan($loanId, $observation = null)
    {
        $loan = DB::table('loans')->where('id', $loanId)->first();

        if (!$loan) {
            return false;
        }

        DB::table('loans')->where('id', $loanId)->update([
            'status'      => 2, // status 2 = devolvido
            'return_date' => now(),
            'observation' => $observation,
        ]);

        return true;
    }
}
