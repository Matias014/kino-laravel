<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Reservation;
use App\Models\ReservationProduct;
use App\Models\ReservationSeat;
use App\Models\ScreeningRoom;
use App\Models\Seance;
use App\Models\Seat;
use App\Models\Technology;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Voucher;
use App\Models\Worker;

class AdminController extends Controller
{
    // public function films() {
    //     $films = Film::all();
    //     return view('admin.films.index', compact('films'));
    // }

    public function products() {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function promotions() {
        $promotions = Promotion::all();
        return view('admin.promotions.index', compact('promotions'));
    }

    public function reservations() {
        $reservations = Reservation::all();
        return view('admin.reservations.index', compact('reservations'));
    }

    public function reservationProducts() {
        $reservationProducts = ReservationProduct::all();
        return view('admin.reservation_products.index', compact('reservationProducts'));
    }

    public function reservationSeats() {
        $reservationSeats = ReservationSeat::all();
        return view('admin.reservation_seats.index', compact('reservationSeats'));
    }

    public function screeningRooms() {
        $screeningRooms = ScreeningRoom::all();
        return view('admin.screening_rooms.index', compact('screeningRooms'));
    }

    public function seances() {
        $seances = Seance::all();
        return view('admin.seances.index', compact('seances'));
    }

    public function seats() {
        $seats = Seat::all();
        return view('admin.seats.index', compact('seats'));
    }

    public function technologies() {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    public function tickets() {
        $tickets = Ticket::all();
        return view('admin.tickets.index', compact('tickets'));
    }

    public function users() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function vouchers() {
        $vouchers = Voucher::all();
        return view('admin.vouchers.index', compact('vouchers'));
    }

    public function workers() {
        $workers = Worker::all();
        return view('admin.workers.index', compact('workers'));
    }
}
