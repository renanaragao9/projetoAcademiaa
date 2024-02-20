@extends('layouts.users')

@section('title', 'Painel do Aluno')

@section('content')

<h1>Posts</h1>
    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
                <!-- Post -->
                <div class="post-container">
                    <div class="post-header">
                        <img src="/img/profile_photo_path/{{ $post->users->profile_photo_path }}" alt="Avatar" class="avatar">
                        <div class="username">{{ $post->users->name }}</div>
                        <div class="post-time">{{ \Carbon\Carbon::parse($post->created_at)->locale('pt_BR')->diffForHumans() }}</div>
                    </div>
                
                    <div class="post-content">
                        {{$post->title_media}}
                    </div>
                    
                    <img src="/img/ocean.jpg" alt="Post Image" class="post-image">
                    
                    <div class="post-tags">
                        <span class="tag">{{ $post->tags_media }}</span>
                    </div>
                    
                    <div class="post-footer">
                        <a class="icon like"><i class="material-icons">thumb_up</i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const likeButton = document.querySelector('.like');
        
        // Verifica se o botão já foi clicado anteriormente
        const isLiked = localStorage.getItem('liked');
        if (isLiked) {
            const icon = likeButton.querySelector('.material-icons');
            icon.classList.add('liked');
        }
        
        likeButton.addEventListener('click', function() {
            const icon = this.querySelector('.material-icons');
            icon.classList.toggle('liked');
            
            // Salva o estado do botão no cache do navegador
            if (icon.classList.contains('liked')) {
                localStorage.setItem('liked', 'true');
            } else {
                localStorage.removeItem('liked');
            }
        });
    });
  </script>
@endsection