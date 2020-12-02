
<!--  ==== Choose as best answers opens ==== -->
@can ('accept', $model)
    <form id="accept-answer-{{ $model->id }}" action="{{ route('answers.accept', $model->id) }}" method="POST" style="display:none;">
        @csrf
    </form>
        <a title="The question owner accepted this answer as best answer"
           class="{{ $model->status }} mt-2"
        >
            <i class="fas fa-check fa-2x"></i>
        </a>
@else
    @if ($model->is_best)
        <a title="Mark this answer as best answer"
           class="{{ $model->status }} mt-2"
           onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $model->id }}').submit();"
        >

            <i class="fas fa-check fa-2x"></i>
        </a>
    @endif
@endcan
<!--  ==== Choose as best answers closes === -->