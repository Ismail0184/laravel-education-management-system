{{-- !-- Delete Warning Modal -->  --}}
<form action="{{ route('classroutines.destroy', $data->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">{{ __('lang.areyousureyouwanttodelete?') }} <br> {{ $data->ghanta->name }} ?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger">{{ __('lang.yesdelete') }} {{ $data->ghanta->name }}</button>
    </div>
</form>