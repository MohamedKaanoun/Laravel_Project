<x-layout>
  @auth
    <div class="relative grid place-items-center">
    </div>
  @endauth
  @guest
    <h1>Guest user</h1>
  @endguest
</x-layout>