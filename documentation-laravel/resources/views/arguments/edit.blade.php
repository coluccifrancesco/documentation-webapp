@extends('layouts.app')

@section('content')
    @auth
        @if (Auth::user()->role === 'admin')
            <form action="{{ route('arguments.update', $argument) }}" method="POST" enctype="multipart/form-data" class="w-75 mx-auto mt-5 border rounded p-4">
                @csrf
                @method('PUT')
                
                <h2>Edit '{{ $argument->name }}'</h2>

                <div class="form-control mb-3 mt-4 d-flex align-items-start flex-column">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="w-100" value="{{ $argument->name }}">
                </div>

                <div class="form-control my-3 d-flex align-items-start flex-column">
                    <label for="resume">Resume</label>
                    <textarea type="text" name="resume" id="resume" class="w-100">{{ $argument->resume }}</textarea>
                </div>

                {{-- Markdown area with preview --}}
                <div class="form-control my-3 d-flex align-items-center flex-column">
                    <label for="md_text" class="align-self-start">Markdown</label>

                    <div class="row w-100 my-2">
                        <div class="col-12 col-xl-6">
                            <textarea type="text" name="md_text" id="md_text" class="w-100">{{ $argument->md_text }}</textarea>
                        </div>

                        <div class="col-12 col-xl-6">
                            <p class="mb-1 d-block d-xl-none text-body-secondary">Preview</p>
                            <div class="form-control bg-body-secondary" style="min-height: 55px; white-space: pre-wrap; word-wrap: break-word; overflow-wrap: break-word;" id="parsedMd"></div>
                        </div>
                    </div>
                </div>

                <div class="form-control my-3 d-flex align-items-start flex-column">
                    <label for="difficulty_id">Difficulty</label>
                    <select name="difficulty_id" id="difficulty_id" class="w-100">
                        @foreach ($difficulties as $difficulty)
                            <option value="{{ $difficulty->id }}"
                                {{ $argument->difficulty_id == $difficulty->id ? 'selected' : '' }}
                            >
                                {{ $difficulty->grade_name }} - {{ $difficulty->grade_numerical }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-control my-3">
                    <p class="mb-0">Technologies</p>
                    
                    <div class="row px-4 py-2">
                        @foreach ($technologies as $tech)
                            <div class="col-12 col-sm-6 col-lg-4 d-flex align-items-center justify-content-between border rounded p-2" style="background-color: {{ $tech->bg_color }}; color:{{ $tech->font_color }}">
                                <label for="tech-{{ $tech->id }}">{{ $tech->name }}</label>
                                <input 
                                    type="checkbox" 
                                    name="techs[]" 
                                    value="{{ $tech->id }}" 
                                    id="tech-{{ $tech->id }}" 
                                    {{ $argument->technologies->contains($tech->id) ? 'checked' : '' }}
                                >
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-control my-3 d-flex align-items-start flex-column">
                    <label for="documentation_link">Documentation link</label>
                    <input type="text" name="documentation_link" id="documentation_link" class="w-100" value="{{ $argument->documentation_link }}"></input>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <button class="btn btn-primary" type="button">
                        <a href="{{ route('arguments.index') }}" class="text-white link-underline link-underline-opacity-0">Go back<i class="ms-2 fa-solid fa-arrow-left"></i></a>
                    </button>
                    
                    <input type="submit" value="Update" class="btn btn-success">
                </div>
            </form>

            {{-- Markdown preview  --}}
            <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
            {{-- Syntax highlight --}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
            <script>
                let userInput = document.getElementById('md_text');
                let parsedMd = document.getElementById('parsedMd');
                let htmlOutput = marked.parse(userInput.value);

                // Syntax highlight logic
                marked.setOptions({
                    highlight: function(code, lang) {
                        if (lang && hljs.getLanguage(lang)) {
                            return hljs.highlight(code, { language: lang }).value;
                        }
                    
                        return code;
                    }
                });

                function updatePreview(){
                    
                    let htmlOutput = marked.parse(userInput.value);
                    parsedMd.innerHTML = htmlOutput;

                    // Highlighting the syntax
                    document.querySelectorAll('pre code').forEach((block) => {
                        hljs.highlightElement(block);
                    });
                }

                updatePreview();
                
                userInput.addEventListener('input', updatePreview);
            </script>
        @else
            <div class="d-flex justify-content-around align-items-center flex-column my-5">
                <h1 class="mb-0" style="font-size: 4rem;">Error 404</h1>
                <h5 class="text-secondary" style="font-size: 1.4rem;">The page does not exist</h5>
                
                <a href="{{ url('/') }}" class="mt-4">
                    <button class="btn btn-primary">Home Page <i class="fa-regular fa-house"></i></button>
                </a>
            </div>
        @endif
    @endauth

    @guest
        <div class="d-flex justify-content-around align-items-center flex-column my-5">
            <h1 class="mb-0" style="font-size: 4rem;">Error 404</h1>
            <h5 class="text-secondary" style="font-size: 1.4rem;">The page does not exist</h5>
                
            <a href="{{ url('/') }}" class="mt-4">
                <button class="btn btn-primary">Home Page <i class="fa-regular fa-house"></i></button>
            </a>
        </div>
    @endguest

@endsection
