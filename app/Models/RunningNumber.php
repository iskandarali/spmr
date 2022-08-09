<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RunningNumber extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'number', 'year'];

    const TYPES = [
        'SKU',
        'reject',
    ];

    const TYPE_PREFIX = [
        'SKU' => 'AFIS',
        'reject' => 'RJCT',
    ];

    public static function generate(string $type)
    {
        $type = strtoupper($type);
        if (! in_array($type, self::TYPES)) {
            throw new \Exception('Undefined running number type.');
        }
        $number = 0;
        $year = date('Y');
        if (! RunningNumber::where('type', $type)->where('year', $year)->exists()) {
            RunningNumber::create([
                'type' => $type,
                'number' => $number,
                'year' => $year,
            ]);
        }

        $running_number = RunningNumber::where('type', $type)->where('year', $year)->first();
        $running_number->number++;
        $running_number->save();
        $number = $running_number->number;
        $number = str_pad($number, 5, '0', STR_PAD_LEFT);

        // A-21-00001
        return RunningNumber::TYPE_PREFIX[$type].'-'.date('y').'-'.$number;
    }
}
