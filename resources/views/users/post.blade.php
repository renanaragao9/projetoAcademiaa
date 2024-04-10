@extends('layouts.users')

@section('title', 'Posts')

@section('content')

    <div class="container">
        <div class="row">
            <div class="card" id="card-tile-mobile">
                <div class="row">
                    <div class="col s12 l12">
                        <i class="material-icons" id="homeUserTitle-icon">tag</i>
                        <h3 id="homeUserTitle" class="center"> Posts </h3>
                    </div>
                </div>
            </div>
            @foreach ($posts as $post)
                <!-- Post -->
                <div class="post-container">
            
                    <div class="post-header">
                        <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/profile_photo_path/') . $post->users->profile_photo_path)) }}" alt="Avatar" class="avatar">
                        <div class="username">{{ $post->users->name }}</div>
                        <div class="post-time">{{ \Carbon\Carbon::parse($post->created_at)->locale('pt_BR')->diffForHumans() }}</div>
                    </div>
                
                    <div class="post-content">
                        {{$post->title_media}}
                    </div>
                    
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/media/') . $post->img_media)) }}" alt="Post Imagem" class="post-image">

                    <div class="post-tags">
                        <span class="tag">{{ $post->description_media }}</span>
                    </div>
                    
                    <div class="post-tags">
                        <span class="tag">{{ $post->tags_media }}</span>
                    </div>
                    
                    <div class="post">
                        <div class="post-footer" id="post-footer-{{$post->id_post}}">
                            <a class="icon like" id="like-{{$post->id_post}}"><i class="material-icons">thumb_up</i></a>
                        </div>
                    </div>
                    
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            const likeButtons = document.querySelectorAll('.like');

            likeButtons.forEach(function(likeButton) {

                const postId = likeButton.dataset.postId;
                const isLiked = localStorage.getItem('liked-' + postId);
                if (isLiked) {
                    const icon = likeButton.querySelector('.material-icons');
                    icon.classList.add('liked');
                }

                likeButton.addEventListener('click', function() {
                    const icon = this.querySelector('.material-icons');
                    icon.classList.toggle('liked');

                    if (icon.classList.contains('liked')) {
                        localStorage.setItem('liked-' + postId, 'true');
                    } else {
                        localStorage.removeItem('liked-' + postId);
                    }
                });
            });
        });
    </script>
@endsection