<div>
    
     <!-- modal-->
     <div class="modal fade" id="myModal"
         @if ($errors->has('pname') || $errors->has('pstatus') || $errors->has('prioritys') || $errors->has('date') || $errors->has('type') || $errors->has('phour'))
            data-backdrop='static'  keyboard='false'
        @endif   
        tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <!-- model content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-titel">
                        Personal Todo-list
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                    
                </div>
                <form method="POST" action="{{route('personal')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pname">
                                Task name
                            </label>
                            <input type="text" name="pname" 
                                   class="form-control @error('pname') is-invalid @enderror"
                                   value="{{old('pname')}}">
                            @error('pname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pstatus">
                                Status
                            </label>
                            <select name="pstatus"  class="form-control @error('pstatus') is-invalid @enderror">
                                <option value="🏃 IN progress">🏃 In progress</option>
                                <option value="⚠ Not started">⚠ not started</option>
                                <option value="✔ Completed">✔ Completed</option>
                                <option value="✖ On hold">✖ on hold</option>
                            </select>
                            @error('pstatus')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="prioritys">
                                Priority
                            </label>
                            <select name="prioritys"  class="form-control @error('prioritys') is-invalid @enderror">
                                <option value="LOW">low</option>
                                <option value="MEDIUM">medium</option>
                                <option value="HIGH">high</option>
                            </select>
                            @error('prioritys')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="date">
                                Due date
                            </label>
                            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{old('date')}}">
                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="type">
                                Task type
                            </label>
                            <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" value="{{old('type')}}">
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phour">
                                Hours budgeted
                            </label>
                            <input type="text" name="phour" class="form-control @error('phour') is-invalid @enderror" value="{{old('hour')}}">
                             @error('phour')
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
    @if ($errors->has('pname') || $errors->has('pstatus') || $errors->has('prioritys') || $errors->has('date') || $errors->has('type') || $errors->has('phour'))
        <script>
            $(document).ready(function() {
                $('#myModal').modal('show');
                 $('#myModal').modal({ backdrop: 'static' , keyboard: false });
            });
        </script>
    @endif
    
