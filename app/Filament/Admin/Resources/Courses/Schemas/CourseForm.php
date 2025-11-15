<?php

namespace App\Filament\Admin\Resources\Courses\Schemas;

use App\Models\Course;
use App\Models\Professor;
use Filament\Actions\Action;
use Filament\Actions\ButtonAction;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;

//use Filament\Forms\Components\Actions\Action;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('code')
                    ->default(null),
                Section::make('اساتید')
                    ->description('اساتیدی که میتوانند درس را تدریس کنند')
                    ->columnSpanFull()
                    ->schema([
                        Repeater::make('professors')
                            ->label('اساتید')
                            ->columns(2)
                            ->schema([
                                Select::make('professor_id')
//                                    todo / do not repeat / full name not just name
                                    ->options(fn() => Professor::pluck('name', 'id'))
                                    ->required(),
                                Select::make('professor_priority')
                                    ->label('اولویت')
                                    ->required()
                                    ->default('medium')
                                    ->options([
                                        'low' => 'کم',
                                        'medium' => 'عادی',
                                        'high' => 'زیاد',
                                    ]),

                            ]),


                    ]),
                Section::make('درس های پیش نیاز')
                    ->columnSpanFull()
                    ->schema([
                        Repeater::make('course_prerequisites')
                            ->label('درس های پیش نیاز')
                            ->columns(2)
                            ->schema([
                                Select::make('course_prerequisite_id')
//                                    todo can not be itself
                                    ->options(fn() => Course::pluck('name', 'id'))
                                    ->required(),
                            ]),
                    ]),
                Section::make('درس های هم نیاز')
                    ->columnSpanFull()
                    ->schema([
                        Repeater::make('course_corequisites')
                            ->label('درس های هم نیاز')
                            ->columns(2)
                            ->schema([
                                Select::make('course_corequisite_id')
                                    ->options(fn() => Course::pluck('name', 'id'))
                                    ->required(),
                            ]),
                    ]),
            ]);
    }
}
