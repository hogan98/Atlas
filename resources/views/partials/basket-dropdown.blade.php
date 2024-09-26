 <!-- Cart Icon -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="cartDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-shopping-cart"></i> Cart
        <span class="badge bg-primary">{{ array_sum(array_column(session('basket', []), 'qty')) }}</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="basketDropdown">
        @if (session('basket') && count(session('basket')) > 0)
            @foreach (session('basket') as $id => $details)
                <li class="dropdown-item">
                    <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" width="50">
                    <strong>{{ $details['name'] }}</strong>
                    <span>{{ $details['qty'] }} x €{{ $details['price'] }}</span>
                </li>
            @endforeach
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('basket.index') }}">View basket</a></li>
        @else
            <li class="dropdown-item">Your basket is empty</li>
        @endif
    </ul>
</li>