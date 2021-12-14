<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rels="stylesheet" href="reset/css">
  <title>Document</title>

  <style>
    body{
      background-color: purple;
    }
    .todo-card
    {
      position: absolute;
      top: 50%;
      left: 50%;
      margin-right: -50%;
      transform: translate(-50%, -50%);
      background-color: white;
      width: 70%;
      border-radius: 10px;
    }
    .todo-title
    {
      font-size: 32px;
      margin: 5px;
      margin-left: 16px;
    }
    .todo-table{
      width: 100%;
    }
    .todo
    {
    }
    .create{
      width: 90%;
      margin-left: 16px;
    }
    .text-area
    {
      width: 90%;
      border: 1px solid #FFE4C4;
      border-radius: 4px;
      height: 24px;
    }
    .create-btn{
      margin: auto auto 16px 24px;
      color: pink;
      border: 1px solid pink;
      border-radius: 8px;
      background-color: white;
      height: 32px;
      width: 64px;
      cursor: pointer;
    }
    .todo-table-td{
      text-align: center;
      height: 32px;
    }
    .table-create{
      width: 30%;
      text-align: center;
    }
    .td-text{
      width: 100%;
      padding: 5px;
      border: 1px solid #FFE4C4;
      border-radius: 12px;
    }
    .td-update{
      padding: 4px 16px;
      text-align: center;
      border: 1px solid pink;
      border-radius: 12px;
      background-color: white;
      cursor: pointer;
    }
    .td-delete{
      padding: 4px 16px;
      text-align: center;
      border: 1px solid pink;
      border-radius: 12px;
      background-color: white;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="todo-card">
    <h1 class="todo-title">ToDo List</h1>
    <div class="todo">
      <form action="/todo/create" method="post">
        @csrf
        <div class="create">
          <input type="text" name="content" class="text-area">
          <input type="submit" class="create-btn" value="追加">
      </form>

          <table class="todo-table">
            <tr class="todo-table-tr">
              <th class="todo-table-th">作成日</th>
              <th class="todo-table-th">タスク名</th>
              <th class="todo-table-th">更新</th>
              <th class="todo-table-th">削除</th>
            </tr>

          @foreach($items as $item)

          <tr class="todo-table-td">
            <td class="table-create">
              {{$item->created_at}}
            </td>

          <form action="/todo/update" method="post">
          @csrf
            <td class="todo-table-td">
              <input type="text" class="td-text" name="content" value="{{$item->content}}">
            </td>
              <td class="todo-table-td">
                <input type="submit" class="td-update" name="update" value="更新">
              </td>
          </form>

            <form action="/todo/delete" method="post">
            @csrf
              <td class= "todo-table-td">
                <input type="submit" class="td-delete" name="delete" value="削除">
              </td>
            </tr>
            </form>
          @endforeach
          </table>
    </div>
  </div>
  </div>
</body>
</html>