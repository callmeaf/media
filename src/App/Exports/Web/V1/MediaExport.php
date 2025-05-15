<?php

namespace Callmeaf\Media\App\Exports\Web\V1;

use Callmeaf\Media\App\Models\Media;
use Callmeaf\Media\App\Repo\Contracts\MediaRepoInterface;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomChunkSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Excel;

class MediaExport implements FromCollection,WithHeadings,Responsable,WithMapping,WithCustomChunkSize
{
    use Exportable;

    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = '';

    /**
     * Optional Writer Type
     */
    private $writerType = Excel::XLSX;

    /**
     * Optional headers
     */
    private $headers = [
        'Content-Type' => 'text/csv',
    ];

    private MediaRepoInterface $mediumRepo;
    public function __construct()
    {
        $this->mediumRepo = app(MediaRepoInterface::class);
        $this->fileName = $this->fileName ?: \Base::exportFileName(model: $this->mediumRepo->getModel()::class,extension: $this->writerType);
    }

    public function collection()
    {
        if(\Base::getTrashedData()) {
            $this->mediumRepo->trashed();
        }

        $this->mediumRepo->latest()->search();

        if(\Base::getAllPagesData()) {
            return $this->mediumRepo->lazy();
        }

        return $this->mediumRepo->paginate();
    }

    public function headings(): array
    {
        return [
           // 'status',
        ];
    }

    /**
     * @param Media $row
     * @return array
     */
    public function map($row): array
    {
        return [
            // $row->status?->value,
        ];
    }

    public function chunkSize(): int
    {
        return \Base::config('export_chunk_size');
    }
}
