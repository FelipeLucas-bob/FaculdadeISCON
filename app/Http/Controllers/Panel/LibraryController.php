<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\BookItemModel;
use App\Models\BookModel;
use App\Models\StudentModel;
use App\Services\LibraryService;
use App\Services\ModuleService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class LibraryController extends Controller
{

    public static string $name = 'Biblioteca';

    public function __construct(protected LibraryService $libraryService, protected ModuleService $moduleService) {}

    /**
     * Display a listing of the resource.
     */
    public function books()
    {
        $books = $this->libraryService->getAllBooks();
        $publishers = $this->libraryService->getAllPublishers();

        return view(
            'admin.library.books-list',
            [
                'catName'    => 'books',
                'title'      => 'Livros',
                "breadcrumbs" => ["Biblioteca", "Listar Livros"],
                'scrollspy'  => 0,
                'simplePage' => 0,
                'books'      => $books,
                'publishers' => $publishers,
            ]
        );
    }

    public function publisherStore(Request $request)
    {
        $publisher = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'website' => $request->website,
        ];

        $this->libraryService->createPublisher($publisher);

        return redirect()->route('library.books')->with('success', 'Editora cadastrada com sucesso!');
    }

    public function bookStore(Request $request)
    {
        try {
            $bookData = [
                'title' => $request->title,
                'author' => $request->author,
                'publication_year' => $request->publication_year,
                'isbn' => $request->isbn,
                'copies' => $request->copies,
                'publisher_id' => $request->publisher_id,
            ];

            // Cria o livro
            $book = $this->libraryService->createBook($bookData);
            $book_id = $book->id;

            // Cria os exemplares (book_items)
            for ($i = 0; $i < $request->copies; $i++) {
                BookItemModel::create([
                    'book_id' => $book_id,
                    'code_system' => Str::random(10), // código único curto
                    'code_library' => 'LIB-' . strtoupper(Str::random(6)), // exemplo de código da biblioteca
                    'status' => 1, // disponível
                ]);
            }

            return redirect()
                ->route('library.books')
                ->with('success', 'Livro cadastrado com sucesso!');
        } catch (Exception $e) {
            // Loga o erro para análise
            Log::error('Erro ao cadastrar livro: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);

            // Retorna mensagem amigável para o usuário
            return redirect()
                ->back()
                ->withInput() // mantém dados já preenchidos no form
                ->with('error', 'Ocorreu um erro ao cadastrar o livro. Tente novamente.');
        }
    }

    public function bookShow(Request $request)
    {
        try {
            $publishers = $this->libraryService->getAllPublishers();
            $book = $this->libraryService->showBook($request->id);

            if (!$book) {
                return redirect()
                    ->route('library.books')
                    ->with('error', 'Livro não encontrado.');
            }

            $bookItems = $this->libraryService->getBookItems($request->id);

            // Carrega a relação items para garantir acesso
            $book->load('items');

            return view(
                'admin.library.book-show',
                [
                    'catName'    => 'books',
                    'title'      => 'Detalhes do Livro',
                    "breadcrumbs" => ["Biblioteca", "Detalhes do Livro"],
                    'scrollspy'  => 0,
                    'simplePage' => 0,
                    'publishers' => $publishers,
                    'book'       => $book,
                    'bookItems'  => $bookItems,
                ]
            );
        } catch (Exception $e) {
            Log::error('Erro ao exibir detalhes do livro: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'book_id' => $request->id
            ]);

            return redirect()
                ->route('library.books')
                ->with('error', 'Não foi possível carregar os detalhes do livro.');
        }
    }


    // public function bookUpdate()
    // {


    //     $user = $this->service->updateUser($id, [
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => $request->password ?? null
    //     ]);

    //     $info = $this->service->editInfo([
    //         'user_id' => $request->user_id,
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'cpf' => $request->cpf,
    //     ]);


    //     return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    // }

    public function bookItemUpdate(Request $request)
    {
        $statuses = $request->input('statuses', []);

        foreach ($statuses as $itemId => $status) {
            if ($status) {
                $this->libraryService->updateBookItemStatus($itemId, $status);
            }
        }

        return redirect()->back()->with('success', 'Status dos exemplares atualizados com sucesso!');
    }


    public function loans()
    {
        $books = $this->libraryService->getAllBooks();
        $publishers = $this->libraryService->getAllPublishers();
        $loans = $this->libraryService->getAllLoans();

        // dd($loans->all());

        // Pega todos os alunos (assumindo que status=aluno seja 2 ou use o que seu sistema define)
        // $students = User::where('role', 'student')->get(); // ajuste 'role' conforme sua tabela

        return view(
            'admin.library.loans-list',
            [
                'catName'    => 'books',
                'title'      => 'Livros',
                'breadcrumbs' => ["Biblioteca", "Listar Livros"],
                'scrollspy'  => 0,
                'simplePage' => 0,
                'books'      => $books,
                'publishers' => $publishers,
                'loans'      => $loans,
                // 'students'   => $students, // envia para a view
            ]
        );
    }

    public function loan($id)
    {
        $loan = $this->libraryService->getLoanById($id);

        if (!$loan) {
            return response()->json(['error' => 'Empréstimo não encontrado'], 404);
        }

        return response()->json([
            'book_title'    => $loan->book_title ?? '',
            'book_code_system'     => $loan->book_code_system ?? '',
            'publisher_name' => $loan->publisher_name ?? '',
            'student_name'  => $loan->student_name ?? '',
            'cpf'           => $loan->cpf ?? '',
            'rg'            => $loan->rg ?? '',
            'observation'   => $loan->observation ?? '',
        ]);
    }


    public function loanCreate()
    {
        $books = $this->libraryService->getAllBooks();
        $bookItems = $this->libraryService->getAllBookItems();
        $publishers = $this->libraryService->getAllPublishers();
        $loans = $this->libraryService->getAllLoans();
        // $students = $this->moduleService->getAllStudents();

        return view(
            'admin.library.loan-create',
            [
                'catName'    => 'books',
                'title'      => 'Registrar Empréstimo',
                'breadcrumbs' => ["Biblioteca", "Registrar Empréstimo"],
                'scrollspy'  => 0,
                'simplePage' => 0,
                'books'      => $books,
                'bookItems'  => $bookItems,
                'publishers' => $publishers,
                'loans'      => $loans,
                // 'students'   => $students, // envia para a view
            ]
        );
    }

    public function searchStudents(Request $request)
    {
        $query = StudentModel::query();

        if ($request->filled('full_name')) {
            $query->where('full_name', 'like', '%' . $request->full_name . '%');
        }

        if ($request->filled('cpf')) {
            $query->where('cpf', 'like', '%' . $request->cpf . '%');
        }

        if ($request->filled('rg')) {
            $query->where('rg', 'like', '%' . $request->rg . '%');
        }

        $students = $query->get();

        return response()->json($students);
    }



    public function searchBooks(Request $request)
    {
        $bookItems = $this->libraryService->searchBooks($request);

        return response()->json($bookItems);
    }

    public function loanStore(Request $request)
    {

        $loanData = [
            'user_id' => $request->user_id,
            'book_item_id' => $request->book_item_id,
            'loan_date' => now(),
            'due_date' => now()->addDays(7),
            'return_date' => null,
            'status' => 1,
        ];
        // dd($loanData);
        try {
            $this->libraryService->createLoan($loanData);
            $this->libraryService->updateBookItemStatus($request->book_item_id, 3); // 3 = emprestado

            return response()->json([
                'success' => true,
                'message' => 'Empréstimo registrado com sucesso.'
            ]);
        } catch (\Exception $e) {
            Log::error('Erro ao registrar empréstimo: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Erro ao registrar empréstimo. Tente novamente.'
            ], 500);
        }
    }

    public function loanReturn(Request $request)
    {
        $request->validate([
            'loan_id'     => 'required|exists:loans,id',
            'observation' => 'nullable|string|max:500',
        ]);

        $loanId = $request->loan_id;
        $observation = $request->observation;

        // Chama service para registrar devolução
        $loan = $this->libraryService->returnLoan($loanId, $observation);

        if (!$loan) {
            return redirect()->back()->with('error', 'Erro ao registrar devolução.');
        }

        return redirect()->back()->with('success', 'Devolução registrada com sucesso!');
    }
}
