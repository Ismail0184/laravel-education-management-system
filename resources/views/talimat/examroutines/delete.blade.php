{{-- !-- Delete Warning Modal -->  --}}
<form action="{{ route('examroutines.destroy', $data->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">{{ __('lang.areyousureyouwanttodelete?') }} <br> {{ $data->exam_date }} ?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger">{{ __('lang.yesdelete') }} {{ $data->exam_date }}</button>
    </div>
</form>