<?php

namespace Callmeaf\Media\App\Imports\Api\V1;

use Callmeaf\Base\App\Services\Importer;
use Callmeaf\Media\App\Enums\MediaStatus;
use Callmeaf\Media\App\Repo\Contracts\MediaRepoInterface;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class MediaImport extends Importer implements ToCollection,WithChunkReading,WithStartRow,SkipsEmptyRows,WithValidation,WithHeadingRow
{
    private MediaRepoInterface $mediumRepo;

    public function __construct()
    {
        $this->mediumRepo = app(MediaRepoInterface::class);
    }

    public function collection(Collection $collection)
    {
        $this->total = $collection->count();

        foreach ($collection as $row) {
            $this->mediumRepo->freshQuery()->create([
                // 'status' => $row['status'],
            ]);
            ++$this->success;
        }
    }

    public function chunkSize(): int
    {
        return \Base::config('import_chunk_size');
    }

    public function startRow(): int
    {
        return 2;
    }

    public function rules(): array
    {
        $table = $this->mediumRepo->getTable();
        return [
            // 'status' => ['required',Rule::enum(MediaStatus::class)],
        ];
    }

}
