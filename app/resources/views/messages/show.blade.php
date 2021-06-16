<div class="x_panel">
    <div class="x_title index-title">
        <div class="index-title-title">
            <h2>{{ $data['message']->title }}
                <small>
                    De: {{ $data['message']->message_sender_name.' - '.$data['message']->message_sender_email }}
                </small>
            </h2>
        </div>

        <div class="index-title-button">
            <form action="{{ route('messages.destroy', $data['message']->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="table-btn table-btn-danger" type="submit">
                    <i class="fa fa-trash"></i></button>
            </form>
        </div>

    </div>
    <div class="x_content">
        <p class="messageOpen_content">{{ $data['message']->content }}</p>


    </div>
</div>
