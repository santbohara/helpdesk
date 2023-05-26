<?php

namespace App\Exports\Admin;

use App\Models\Admin\Ticket;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TicketsExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    use Exportable;

    private $status;
    
    public function __construct($status)
    {
        $this->status    = $status;
    }

    private $columns = [
        'Ticket ID',
        'Customer Name',
        'Account Number',
        'Mobile',
        'Email',
        'Topic',
        'Subject',
        'Description',
        'Current Status',
        'Ticket Date',
    ];

    public function headings(): array
    {
        return $this->columns;
    }

    public function map($question): array
    {
        return [
            $question->ticket_id,
            $question->name,
            $question->account_number,
            $question->mobile,
            $question->email,
            $question->Topic->title,
            $question->subject,
            $question->description,
            $question->Status->title,
            $question->created_at,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function collection()
    {
        $result = Ticket::query();

        $result->when($this->status,function($result){
            $result = $result->where('status',$this->status);
        });
        
        $result = $result->select(
            'ticket_id',
            'name',
            'account_number',
            'mobile',
            'email',
            'topic_id',
            'subject',
            'description',
            'status',
            'created_at')
        ->get();

        return $result;
    }
}
