@extends('layout.main')
@section('title')
 task maken   
@endsection
<link rel="stylesheet" href="css/tasks.css">

@section('content')
    

    <form action="{{ url('task') }}" method="POST" class="task">

      <label for="text">Task: </label>
      <input type="text" name="task"><br>
      
      <label for="text">Deadline: </label>
      <input type="date" name="deadline"><br>

      <label for="text">status: </label>
      <select id="status" name="status">
        <option value="afgerond">Afgerond</option>
        <option value="bezig">Bezig</option>
        <option value="not_started">nog niet begonnen</option>
      </select><br>
      <input type="submit">
    </form>


@endsection