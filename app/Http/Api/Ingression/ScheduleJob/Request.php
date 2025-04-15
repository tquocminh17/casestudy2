<?php declare(strict_types=1);

namespace App\Http\Api\Ingression\ScheduleJob;

use App\Enums\JobType;
use Carbon\CarbonImmutable;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class Request extends FormRequest
{
    public function authorize(): Response
    {
        return Gate::inspect('scheduleJobs', $this->user());
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'type' => ['required', 'string', Rule::enum(JobType::class)],
            'template_id' => 'required|uuid',
            'template_vars' => 'required|array',
            'scheduled_at' => 'required|date|date_format:Y-m-d\TH:i:s\Z',
        ];
    }

    public function type(): JobType
    {
        return JobType::from($this->string('type')->value());
    }

    public function templateId(): string
    {
        return $this->string('template_id')->value();
    }

    /**
     * @return array<string, mixed>
     */
    public function templateVars(): array
    {
        /** @var array<string, mixed> */
        return $this->array('template_vars');
    }

    public function scheduledAt(): CarbonImmutable
    {
        return $this->immutableDate('scheduled_at');
    }
}
