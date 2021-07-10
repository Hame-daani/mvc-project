<x-base>
    <h1>edit my info</h1>
    <br>
    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <label for="name">name:</label>
        <input type="text" name="name" id="name" placeholder="{{ $user->name }}">
        <br>
        <br>
        <label for="email">email:</label>
        <input type="text" name="email" id="email" placeholder="{{ $user->email }}">
        <input type="submit" value="update">
    </form>
</x-base>
