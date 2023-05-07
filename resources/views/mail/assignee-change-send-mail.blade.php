<h1>Hello {{$dulieu['oldAssignee']}}</h1>
<p>This is a test mail sent from {{$dulieu['from']}}</p>
<p>{{$dulieu['task_name']}} task's assignee has been change from you to {{$dulieu['new_assignee']}}. Please be informed!</p>
@if (isset($dulieu['new_task_name']))
    <p>Task name change from <strong>{{$dulieu['task_name']}}</strong> to <strong>{{$dulieu['new_task_name']}}</strong></p>
@endif
@if (isset($dulieu['new_assignee']))
    <p>Task name change from <strong>{{$dulieu['task_name']}}</strong> to <strong>{{$dulieu['new_task_name']}}</strong></p>
@endif
@if (isset($dulieu['new_start_date']))
    <p>Task name change from <strong>{{$dulieu['task_name']}}</strong> to <strong>{{$dulieu['new_task_name']}}</strong></p>
@endif
@if (isset($dulieu['new_end_date']))
    <p>Task name change from <strong>{{$dulieu['task_name']}}</strong> to <strong>{{$dulieu['new_task_name']}}</strong></p>
@endif
@if (isset($dulieu['new_cost']))
    <p>Task name change from <strong>{{$dulieu['task_name']}}</strong> to <strong>{{$dulieu['new_task_name']}}</strong></p>
@endif
@if (isset($dulieu['new_desc']))
    <p>Task name change from <strong>{{$dulieu['task_name']}}</strong> to <strong>{{$dulieu['new_task_name']}}</strong></p>
@endif
@if (isset($dulieu['new_status']))
    <p>Task name change from <strong>{{$dulieu['task_name']}}</strong> to <strong>{{$dulieu['new_task_name']}}</strong></p>
@endif