<h4 class="bg-white py-1 px-3 rounded d-inline-block text-secondary">Personal Todo-list</h4>
        <table class="table table-hover table-responsive-xl" style="color: rgb(82, 80, 80)">
            <thead>
                <tr>
                    <th>Task name</th>
                    <th>Statue</th>
                    <th>Priority</th>
                    <th>Due date</th>
                    <th>Task type</th>
                    <th>Hours budgeted</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @if ($personals == 'hello')
                    {{__('')}}
                @else
                    @foreach ($personals as $item)
                    <tr>
                        <td>{{ $item->pname}}</td>
                        <td>{{ $item->pstatus}}</td>
                        <td class="@if ($item->prioritys === 'HIGH') bg-danger @endif @if ($item->prioritys === 'MEDIUM') bg-warning @endif @if ($item->prioritys === 'LOW') bg-primary @endif">
                            {{ $item->prioritys}}
                        </td>
                        <td>{{ $item->date}}</td>
                        <td>{{ $item->type}}</td>
                        <td>{{ $item->phour}}</td>
                        <td>
                            <a href="{{ route('edit.personal', $item->id)}}" class="text-decoration-none text-info">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('personal.delete', $item->id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-default text-danger font-weight-bolder" type="submit">
                                    &times;
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>