<?php

namespace App\Repositories;

use App\Models\BookModel;
use App\Models\LibraryModel;
use App\Models\LoanModel;
use App\Models\PublisherModel;
use Illuminate\Support\Collection;

class LibraryRepository
{
    public function all(): Collection
    {
        return LibraryModel::all();
    }

    public function find(int $id): ?LibraryModel
    {
        return LibraryModel::find($id);
    }

    public function save(LibraryModel $libraryModel)
    {
        $libraryModel->save();
        return $libraryModel;
    }
    public function update(LibraryModel $libraryModel, array $data): bool
    {
        return $libraryModel->update($data);
    }

    public function delete(LibraryModel $libraryModel): bool
    {
        return $libraryModel->delete();
    }

    public function savePublisher(PublisherModel $publisherModel)
    {
        $publisherModel->save();
        return $publisherModel;
    }

    public function saveBook(BookModel $bookModel)
    {
        $bookModel->save();
        return $bookModel;
    }

    public function saveLoan(LoanModel $loanModel)
    {
        $loanModel->save();
        return $loanModel;
    }

}
