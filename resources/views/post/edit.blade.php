@extends('layouts.app')

@section('content')
<div>
    <div class="container mx-auto">
      <div class="pt-16 lg:pt-20">
          <x-validation-errors />
          <form action="{{ route('post.update', $post) }}" method="POST">
              @method('PUT')
              @csrf
            <div class="w-full">
                <x-label>Title</x-label>
                <x-input type="text" name="title" value="{{ $post->title }}" placeholder="Enter placeholder here..." />
            </div>
            <div class="w-full pt-6 sm:pt-10">
                <x-label>Description</x-label>
                <textarea id="message" cols="30" rows="9" name="description" placeholder="Got to be honest with you, Lorem is no body's mate..." class="w-full border border-primary bg-grey-lightest px-5 py-4 font-body font-light text-primary placeholder-primary transition-colors focus:border-secondary focus:outline-none focus:ring-2 focus:ring-secondary dark:text-white">{{ $post->description }}</textarea>
            </div>
            <div class="w-full mt-3">
                <x-label>Status</x-label>
                <select name="state" class="w-full">
                    @foreach (\App\Enums\PostState::cases() as $state)
                        <option value="{{ $state->value }}" @selected($post->state == $state->value))>{{ $state->value }}</option>
                    @endforeach
                </select>
            </div>
            <x-button type="submit" class="mt-3">Update Now</x-button>
          </form>
      </div>
    </div>
</div>
@endsection