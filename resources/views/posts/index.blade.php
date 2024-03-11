@extends('layouts.admin')

@section('content')
    <div class="container mt-5">

        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <h2>Job Posts</h2>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="pagination-info">

            </div>
            <div class="action-buttons">
                <a href="{{ route('admin.posts.create') }}" class="btn1">Create New Post</a>
            </div>
        </div>

        @if ($posts->isEmpty())
            <table class="table table-striped" id="posts-table">
                <tbody>
                <tr>
                    <td colspan="6" class="text-center">No posts found. <a href="{{ route('admin.posts.create') }}">Create a new post</a></td>
                </tr>
                </tbody>
            </table>
        @else
            <table class="table table-striped" id="posts-table">
                <thead>
                <tr>
                    <th>Post Name</th>
                    <th>Business Unit</th>
                    <th>Manager Name</th>
                    <th>Closing Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->business_unit }}</td>
                        <td>{{ $post->manager_name }}</td>
                        <td>{{ $post->closing_date }}</td>
                        <td>
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#postDetailsModal" data-post-id="{{ $post->id }}">View</a>

                            <!-- Modal -->
                            <div class="modal fade" id="postDetailsModal" tabindex="-1" aria-labelledby="postDetailsModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="postDetailsModalLabel">Post Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- details will be displayed here -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" id="delete-form-{{ $post->id }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $post->id }})">Delete</button>
                            </form>

                            <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this post?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-danger" onclick="deletePost()">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endif
    </div>

    <script src="{{ asset('js/post.index.js') }}"></script>

@endsection
