<?php

namespace App\Exports\Admin;

use App\Models\Admin\Question;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class QuestionsExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;

    private $columns = [
        'topic_id',
        'title',
        'active',
        'views',
        'created_by',
        'created_at',
    ];

    public function headings(): array
    {
        return $this->columns;
    }

    public function map($question): array
    {
        return [
            $question->Topic->title,
            $question->title,
            $question->active == true ? 'Active' : 'Disabled',
            $question->views,
            $question->created_by,
            $question->created_at,
        ];
    }

    public function collection()
    {
        return Question::select($this->columns)->get();
    }
}
