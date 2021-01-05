 <div class="modal fade" id="myModalgroup"
    @if ($errors->has('tname') || $errors->has('status') || $errors->has('priority') || $errors->has('ddate') || $errors->has('ttype') || $errors->has('hour') || $errors->has('assignee'))
        data-backdrop='static'  keyboard='false'
    @endif
    tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <!-- model content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-titel">
                        Group todo-list
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                    
                </div>
                <form method="POST" action="{{route('grouptodo.store')}}">
                    @csrf
                    <div class="modal-body">
                       
                        <div class="form-group">
                            <label for="tname">
                                Task name
                            </label>
                            <input type="text" name="tname" 
                                   class="form-control @error('tname') is-invalid @enderror"
                                   value="{{old('tname')}}">
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
                            <select name="status"  class="form-control @error('status') is-invalid @enderror"
                            required>
                                <option value="🏃 IN progress">🏃 In progress</option>
                                <option value="⚠ Not started">⚠ not started</option>
                                <option value="✔ Completed">✔ Completed</option>
                                <option value="✖ On hold">✖ on hold</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="priority">
                                Priority
                            </label>
                            <select name="priority" class="form-control @error('priority') is-invalid @enderror"
                                    required>
                                <option value="LOW">low</option>
                                <option value="MEDIUM">medium</option>
                                <option value="HIGH">high</option>
                            </select>
                            @error('priority')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="ddate">
                                Due date
                            </label>
                            <input type="date" name="ddate" class="form-control @error('ddate') is-invalid @enderror"  value="{{old('ddate')}}">
                            @error('ddate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="ttype">
                                Task type
                            </label>
                            <input type="text" name="ttype" class="form-control @error('ttype') is-invalid @enderror"  value="{{old('ttype')}}">
                            @error('ttype')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="assignee">
                                Assignee 
                            </label>  
                            <select name="assignee" class="form-control @error('assignee') is-invalid @enderror"
                                    required>
                                    @if ($lists === 'hello')
                                        {{__('')}}
                                    @else
                                        @forelse ($lists as $list)
                                            <option value="{{$list->id}}">{{$name = $list->name}}</option>
                                            
                                        @empty
                                            No user as join your Group
                                        @endforelse
                                    @endif
                                   
                            </select>
                            @error('assignee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="hour">
                                Hours budgeted
                            </label>
                            <input type="text" name="hour" class="form-control @error('hour') is-invalid @enderror"  value="{{old('hour')}}">
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


    @if ($errors->has('tname') || $errors->has('status') || $errors->has('priority') || $errors->has('ddate') || $errors->has('ttype') || $errors->has('hour') || $errors->has('assignee'))
        <script>
            $(document).ready(function() {
                $('#myModalgroup').modal('show');
                $('#myModalgroup').modal({ backdrop: 'static' , keyboard: false });
            });
        </script>
    @endif