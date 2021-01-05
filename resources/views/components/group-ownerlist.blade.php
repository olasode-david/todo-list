 @forelse ($groupName as $item)
                <h4 class="bg-white py-1 px-3 rounded d-inline-block text-secondary">{{ $item->gname}} Group Todo-list 
                    <i style="color:#bbb; font-size:8px; font-weight:bolder">owner</i>
                </h4>
                <table class="table table-hover table-responsive-xl" style="color: rgb(82, 80, 80)">
                    <thead>
                        <tr>
                            <th>Task name</th>
                            <th>Statue</th>
                            <th>Priority</th>
                            <th>Due date</th>
                            <th>Task type</th>
                            <th>Assignee</th>
                            <th>Hours budgeted</th>
                            @if ($item->owner == 'Admin')
                                <th>Update</th>
                            @endif
                            @if ($item->owner == "Admin")
                                <th>
                                    Delete
                                </th>
                            @endif
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                        @if ($groupTodo === "hello")
                            {{__('')}}
                        @else
                            @forelse ($groupTodo as $todo)
                                <tr>
                                    
                                    <td>{{$todo->tname}}</td>
                                    <td>{{$todo->status}}</td>
                                    <td class="@if ($todo->priority === 'HIGH') bg-danger @endif @if ($todo->priority === 'MEDIUM') bg-warning @endif @if ($todo->priority === 'LOW') bg-primary @endif">
                                        {{$todo->priority}}
                                    </td>
                                    <td>{{$todo->ddate}}</td>
                                    <td>{{$todo->ttype}}</td>
                                    <td>
                                        @if ($lists === "hello")
                                            {{__('')}}
                                        @else
                                            @foreach ($todo->tags as $tag)
                                                {{$tag->name}}
                                            @endforeach
                                        @endif
                                        
                                    </td>
                                    <td>{{$todo->hour}}</td>
                                    <td>
                                        @if ($item->owner == 'Admin')
                                            <a href="{{route('grouptodo.edit',$todo->id)}}" class="text-decoration-none">
                                                Edit
                                            </a>
                                        @endif
                                    </td> 
                                    <td>
                                       
                                        @if ($item->owner == 'Admin')
                                            <form method="POST" action="{{ route('grouptodo.delete', $todo->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-default text-danger font-weight-bolder" type="submit">
                                                    &times;
                                                </button>
                                            </form>
                                        @endif
                                        
                                    </td>
                                </tr>
                            @empty
                                {{$groupTodo}}
                            @endforelse
                        @endif
                       
                    
                    </tbody>
                    
                </table>




            @empty
                @if ($outs == 'hello')
                    <a href="{{route('group.create')}}" class="btn btn-outline-secondary float-right">
                        create a group name
                    </a> 
                @else
                    {{__('')}}
                @endif
                
               
            @endforelse