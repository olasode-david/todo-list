<x-master>
    <!-- Group todo-list edit son! -->
<div>
<script>
$(document).ready(function() {

$('#myTodo2').modal('show');
$('#myTodo2').modal({ backdrop: 'static' , keyboard: false });

});
</script>

<!-- modal-->
<div class="modal fade" id="myTodo2"  data-backdrop='static'  keyboard='false' tabindex="-1" role="dialog">
<div class="modal-dialog">
<!-- model content -->
<div class="modal-content">
<div class="modal-header">
   <h5 class="modal-titel">
       Group Todo-list <span style="font-size:12px" class="text-info">Edit</span>
   </h5>   
</div>
<form method="POST" action="{{ route('grouptodo.up', $groupTodo->id)}}">
   @csrf
   @method('PUT')
    <div class="modal-body">
        <h6 class="text-center">
            You're only allowed to update the 
            <span class="font-weight-bold">
                status
            </span> field.
        </h6>

        <div class="form-group d-none">
            <label for="user_id">
                user_id
            </label>
            <input type="text" name="user_id" value="{{$groupTodo->user_id}}"
                   class="form-control @error('user_id') is-invalid @enderror">
            @error('user_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group d-none">
            <label for="group_id">
                group_id
            </label>
            <input type="text" name="group_id" value="{{$groupTodo->group_id}}"
                   class="form-control @error('group_id') is-invalid @enderror">
            @error('group_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group d-none">
            <label for="gname">
                group name
            </label>
            <input type="text" name="gname" value="{{$groupTodo->gname}}"
                   class="form-control @error('gname') is-invalid @enderror">
            @error('gname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group d-none">
            <label for="tname">
                Task name
            </label>
            <input type="text" name="tname" value="{{$groupTodo->tname}}"
                   class="form-control @error('tname') is-invalid @enderror">
            @error('tname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">
                Status
            </label>
            <select name="status"  class="form-control @error('status') is-invalid @enderror">
                <option @if ($groupTodo->status == '🏃 IN progress') selected @endif
                    value="🏃 IN progress">🏃 In progress
                </option>
                <option  @if ($groupTodo->status == '⚠ Not started') selected @endif
                    value="⚠ Not started">⚠ not started
                </option>
                <option @if ($groupTodo->status == '✔ Completed') selected @endif
                    value="✔ Completed">✔ Completed
                </option>
                <option @if ($groupTodo->status == '✖ On hold') selected @endif
                    value="✖ On hold">✖ on hold
                </option>
            </select>
            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group d-none">
            <label for="priority">
                Priority
            </label>
            <select name="priority"  class="form-control @error('priority') is-invalid @enderror">
                <option @if ($groupTodo->priority == 'LOW') selected @endif
                    value="LOW">low
                </option>
                <option @if ($groupTodo->priority == 'MEDIUM') selected @endif
                    value="MEDIUM">medium
                </option>
                <option @if ($groupTodo->priority == 'HIGH') selected @endif
                    value="HIGH">high
                </option>
            </select>
            @error('priority')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group d-none">
            <label for="ddate">
                Due date
            </label>
            <input type="date" name="ddate" value="{{$groupTodo->ddate}}"
                 class="form-control @error('ddate') is-invalid @enderror">
            @error('ddate')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group d-none">
            <label for="ttype">
                Task type
            </label>
            <input type="text" name="ttype" value="{{$groupTodo->ttype}}"
            class="form-control @error('ttype') is-invalid @enderror">
            @error('ttype')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group d-none">
            <label for="hour">
                Hours budgeted
            </label>
            <input type="text" name="hour" value="{{$groupTodo->hour}}"
              class="form-control @error('hour') is-invalid @enderror">
             @error('hour')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

    </div>

   <div class="modal-footer">
       <button type="submit" class="btn btn-info">
           Submit
       </button>
   </div>
</form>
</div>
</div>
</div>

</div>
{{-- @if ($errors->has('tname') || $errors->has('status') || $errors->has('priority') || $errors->has('ddate') || $errors->has('ttype') || $errors->has('hour') || $errors->has('ahour'))

@endif --}}



</x-master>