<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\DocumentModel;
use App\Models\UserDocumentModel;
use App\Services\DocumentService;
use App\Services\ModuleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{

    public static string $name = 'Documentos';

    public function __construct(protected DocumentService $documentService, protected ModuleService $moduleService) {}

    /**  
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function show(DocumentModel $documentModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentModel $documentModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DocumentModel $documentModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentModel $documentModel)
    {
        //
    }

    public function contract()
    {
        $documents = $this->documentService->getAll();

        return view(
            'admin.documents.documents',
            [
                'catName' => 'documents',
                'title' => 'Documentos',
                "breadcrumbs" => ["Documentos", "Contrato"],
                'scrollspy' => 0,
                'simplePage' => 0,
                'documents' => $documents,
            ]
        );
    }


    public function contractUser()
    {
        $documents = $this->documentService->getAll();

        return view(
            'admin.documents.documents',
            [
                'catName' => 'documents',
                'title' => 'Documentos',
                "breadcrumbs" => ["Documentos", "Contrato do Usuário"],
                'scrollspy' => 0,
                'simplePage' => 0,
                'documents' => $documents,
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'documento' => 'required|file|max:10240', // 10 MB
            'nome_doc' => 'required|string',
        ]);

        $user = Auth::user();
        $docName = $request->nome_doc;
        $file = $request->file('documento');

        // Se já existe, apaga o arquivo antigo
        $documentoExistente = UserDocumentModel::where('user_id', $user->id)
            ->where('tipo', $docName)
            ->first();

        if ($documentoExistente && FacadesStorage::disk('public')->exists('documentos/' . $documentoExistente->arquivo)) {
            FacadesStorage::disk('public')->delete('documentos/' . $documentoExistente->arquivo);
        }

        // Salva o novo arquivo
        $filename = $docName . '_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('documentos', $filename, 'public');

        // Atualiza ou cria registro no banco
        $document = UserDocumentModel::updateOrCreate(
            ['user_id' => $user->id, 'tipo' => $docName],
            [
                'arquivo' => $filename,
                'status' => 'Enviado',
            ]
        );

        return response()->json([
            'message' => "$docName enviado com sucesso!",
            'arquivo' => $filename,
            'status' => $document->status
        ]);
    }
}
