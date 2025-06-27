@extends('backend.admin')
@section('title', 'View Shayari')

@section('content')

    <style>
        .view-wrapper {
            width: 800px;
            margin: 2rem auto;
            background: #fff;
            padding: 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }

        .view-title {
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            color: #1f2937;
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 0.5rem;
        }

        .view-field {
            margin-bottom: 1.2rem;
        }

        .view-field label {
            font-weight: bold;
            color: #4b5563;
            display: block;
            margin-bottom: 0.3rem;
        }

        .view-field p {
            font-size: 1rem;
            color: #1f2937;
            background: #f9fafb;
            padding: 0.8rem 1rem;
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
        }

        .back-btn {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.5rem 1.2rem;
            background-color: #3b82f6;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-btn:hover {
            background-color: #2563eb;
        }
    </style>

    <div class="view-wrapper">
        <h2 class="view-title">View Navbar Detail</h2>
        <div class="view-field">
            <label>Nsav Item:</label>
            <p>{{ $navbaritem->navitem }}</p>
        </div>

    

        <div class="view-field">
            <label>Link:</label>
            <p><a href="{{ $navbaritem->link }}" target="_blank">{{ $navbaritem->link }}</a></p>
        </div>

        <div class="view-field">
            <label>Sequence:</label>
            <p>{{ $navbaritem->sequence }}</p>
        </div>

        <a href="{{ route('navbarlist') }}" class="back-btn">← Back to List</a>
    </div>

@endsection
