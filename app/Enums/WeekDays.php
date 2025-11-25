<?php

namespace App\Enums;

enum WeekDays: string
{
    case Saturday = 'saturday';
    case Sunday = 'sunday';
    case Monday = 'monday';
    case Tuesday = 'tuesday';
    case Wednesday = 'wednesday';
    case Thursday = 'thursday';
    case Friday = 'friday';

    public function faName(): string
    {
        return match ($this) {
            self::Saturday => 'شنبه',
            self::Sunday => 'یکشنبه',
            self::Monday => 'دوشنبه',
            self::Tuesday => 'سه‌شنبه',
            self::Wednesday => 'چهارشنبه',
            self::Thursday => 'پنجشنبه',
            self::Friday => 'جمعه',
        };
    }

    public function next(): self
    {
        $currentIndex = $this->index();
        $nextIndex = ($currentIndex + 1) % self::count();
        return self::byIndex($nextIndex);
    }

    public function previous(): self
    {
        $currentIndex = $this->index();
        $previousIndex = ($currentIndex - 1 + self::count()) % self::count();
        return self::byIndex($previousIndex);
    }

    public function index(): false|int|string
    {
        return array_search($this, self::cases());
    }

    public static function byIndex(int $index): self
    {
        $cases = self::cases();
        return $cases[$index];
    }

    public static function count(): int
    {
        return count(self::cases());
    }
}
