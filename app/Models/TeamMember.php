<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class TeamMember extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = [
        'name',
        'role_en', 'role_de', 'role_ar',
        'bio_en',  'bio_de',  'bio_ar',
        'photo',
        'is_founder',
        'is_cofounder',
        'linkedin',
        'sort_order',
        'visible',
    ];

    protected $casts = [
        'visible'    => 'boolean',
        'is_founder'   => 'boolean',
        'is_cofounder' => 'boolean',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }

    /** Founder or co-founder: shown as a large leader card. */
    public function isLeader(): bool
    {
        return (bool) ($this->is_founder || $this->is_cofounder);
    }

    /** Explicit co-founder flag (set in the admin form). */
    public function isCoFounder(): bool
    {
        return (bool) $this->is_cofounder && ! $this->is_founder;
    }

    /** Badge text for founder-type members: "Founder" or "Co-founder", in the given language. */
    public function leaderLabel(string $lang = 'en'): string
    {
        if ($this->isCoFounder()) {
            return $lang === 'ar' ? 'شريك مؤسس' : ($lang === 'de' ? 'Mitgründer' : 'Co-founder');
        }

        return $lang === 'ar' ? 'المؤسس' : ($lang === 'de' ? 'Gründer' : 'Founder');
    }
}
