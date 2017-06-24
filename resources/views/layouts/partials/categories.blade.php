<style>
.list-group-item {border-color: white !important;}
</style>
<div class="col-md-3">
    <h4>Category</h4>
    <ul class="list-group">
        <a href="{{route('thread.index')}}" class="list-group-item">
            <span class="badge">3</span>
            Jobs
        </a>
        <a href="{{route('posts.index')}}" class="list-group-item">
            <span class="badge">6</span>
            Posts
        </a>
        <a href="/chat" class="list-group-item">
            Chat
        </a>
    </ul>
</div>