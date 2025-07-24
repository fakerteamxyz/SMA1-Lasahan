<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnnouncementResource\Pages;
use App\Models\Announcement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;

class AnnouncementResource extends Resource
{
    protected static ?string $model = Announcement::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    protected static ?string $navigationLabel = 'Pengumuman';

    protected static ?string $modelLabel = 'Pengumuman';

    protected static ?string $pluralModelLabel = 'Pengumuman';

    protected static ?string $navigationGroup = 'Konten Website';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Pengumuman')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Pengumuman')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Textarea::make('content')
                            ->label('Isi Pengumuman')
                            ->required()
                            ->rows(6)
                            ->columnSpanFull(),

                        Select::make('category')
                            ->label('Kategori')
                            ->options([
                                'kegiatan' => 'Kegiatan Sekolah',
                                'ujian' => 'Ujian',
                                'libur' => 'Libur',
                                'ppdb' => 'PPDB',
                                'umum' => 'Umum',
                            ])
                            ->required()
                            ->default('umum'),

                        Select::make('priority')
                            ->label('Prioritas')
                            ->options([
                                'low' => 'Rendah',
                                'normal' => 'Normal',
                                'high' => 'Tinggi',
                                'urgent' => 'Mendesak',
                            ])
                            ->required()
                            ->default('normal'),
                    ])
                    ->columns(2),

                Section::make('Tanggal dan Publikasi')
                    ->schema([
                        DatePicker::make('announcement_date')
                            ->label('Tanggal Pengumuman')
                            ->required()
                            ->default(now()),

                        DatePicker::make('valid_until')
                            ->label('Berlaku Sampai')
                            ->helperText('Kosongkan jika tidak ada batas waktu'),

                        Toggle::make('is_published')
                            ->label('Publikasikan')
                            ->helperText('Pengumuman yang dipublikasikan akan tampil di website')
                            ->default(true),

                        Toggle::make('is_featured')
                            ->label('Tampilkan di Beranda')
                            ->helperText('Pengumuman utama yang akan ditampilkan di halaman beranda')
                            ->default(false),
                    ])
                    ->columns(2),

                Section::make('Lampiran dan Tautan')
                    ->schema([
                        TextInput::make('attachment_url')
                            ->label('URL Lampiran')
                            ->url()
                            ->helperText('Link ke file PDF, gambar, atau dokumen lainnya'),

                        TextInput::make('external_link')
                            ->label('Tautan Eksternal')
                            ->url()
                            ->helperText('Link ke halaman web terkait pengumuman'),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                BadgeColumn::make('category')
                    ->label('Kategori')
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'kegiatan' => 'Kegiatan',
                        'ujian' => 'Ujian',
                        'libur' => 'Libur',
                        'ppdb' => 'PPDB',
                        'umum' => 'Umum',
                        default => $state,
                    })
                    ->colors([
                        'success' => 'kegiatan',
                        'danger' => 'ujian',
                        'warning' => 'libur',
                        'info' => 'ppdb',
                        'secondary' => 'umum',
                    ]),

                BadgeColumn::make('priority')
                    ->label('Prioritas')
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'low' => 'Rendah',
                        'normal' => 'Normal',
                        'high' => 'Tinggi',
                        'urgent' => 'Mendesak',
                        default => $state,
                    })
                    ->colors([
                        'secondary' => 'low',
                        'primary' => 'normal',
                        'warning' => 'high',
                        'danger' => 'urgent',
                    ]),

                TextColumn::make('announcement_date')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('valid_until')
                    ->label('Berlaku Sampai')
                    ->date('d M Y')
                    ->placeholder('Tidak terbatas'),

                BooleanColumn::make('is_published')
                    ->label('Dipublikasikan'),

                BooleanColumn::make('is_featured')
                    ->label('Unggulan'),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->label('Kategori')
                    ->options([
                        'kegiatan' => 'Kegiatan Sekolah',
                        'ujian' => 'Ujian',
                        'libur' => 'Libur',
                        'ppdb' => 'PPDB',
                        'umum' => 'Umum',
                    ]),

                SelectFilter::make('priority')
                    ->label('Prioritas')
                    ->options([
                        'low' => 'Rendah',
                        'normal' => 'Normal',
                        'high' => 'Tinggi',
                        'urgent' => 'Mendesak',
                    ]),

                Filter::make('is_published')
                    ->label('Hanya yang Dipublikasikan')
                    ->query(fn(Builder $query): Builder => $query->where('is_published', true)),

                Filter::make('is_featured')
                    ->label('Hanya Unggulan')
                    ->query(fn(Builder $query): Builder => $query->where('is_featured', true)),

                Filter::make('active')
                    ->label('Masih Berlaku')
                    ->query(fn(Builder $query): Builder => $query->active()),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('announcement_date', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAnnouncements::route('/'),
            'create' => Pages\CreateAnnouncement::route('/create'),
            'edit' => Pages\EditAnnouncement::route('/{record}/edit'),
        ];
    }
}
