<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','user_name','phone','email','password',
    ];
    public function getTableColumnsWithTypes()
    {
                // Get all column names for the table
                $columns = $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());

                // Define the columns to skip
                $columnsToSkip = ['password', 'updated_at'];

                // Filter out the columns to skip
                $filteredColumns = array_diff($columns, $columnsToSkip);

                // Prepare an array to hold column names and types
                $columnsWithTypes = [];

                foreach ($filteredColumns as $column) {
                    $type = Schema::getColumnType($this->getTable(), $column);
                    $columnsWithTypes[$column] = $type;
                }

                return $columnsWithTypes;

    }
}
