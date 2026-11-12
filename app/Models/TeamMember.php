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
        'linkedin',
        'sort_order',
        'visible',
    ];

    protected $casts = [
        'visible'    => 'boolean',
        'is_founder' => 'boolean',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }

    /** True when the role text says "Co-Founder" / "Mitgründer" / "شريك مؤسس" etc. */
    public function isCoFounder(): bool
    {
        $role = mb_strtolower(trim(($this->role_en ?? '') . ' ' . ($this->role_de ?? '') . ' ' . ($this->role_ar ?? '')));

        return (bool) preg_match('/co[\s\-\.]*found|mitgr[üu]nd|mitbegr[üu]nd|شريك\s+مؤسس|مؤسس\s+مشارك|مؤسس\s+مشترك/u', $role);
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
