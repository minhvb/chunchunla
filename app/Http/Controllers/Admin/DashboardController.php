<?php

namespace App\Http\Controllers\Admin;

use App\Models\Eat;
use App\Models\Sleep;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;

class DashboardController extends Controller
{
    protected array $data = []; // the information we send to the view

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(backpack_middleware());
    }

    /**
     * Show the admin dashboard.
     *
     * @return View
     */
    public function dashboard()
    {
        $this->data['title'] = trans('backpack::base.dashboard'); // set the page title
        $startOfDay = new Carbon();
        $startOfDay->setHour(8)->setMinute(0)->setSecond(0);
        $endOfDay = clone $startOfDay;
        $endOfDay->addDay()->subMinute();
        $eats = Eat
            ::where('start', '<=', $endOfDay)
            ->where('start', '>=', $startOfDay)
            ->get()
        ;

        $this->data['totalEats'] = count($eats);
        $this->data['totalAmount'] = $eats->pluck('amount')->sum();
        $this->data['standardEat'] = config('app.standard_eats');
        if ($this->data['totalEats'] <= config('app.standard_eats')) {
            $this->data['eatMessage'] = sprintf(
                '%s cữ bú nữa mới đủ tiêu chuẩn ngày',
                config('app.standard_eats') - $this->data['totalEats']
            );
        } else {
            $this->data['eatMessage'] = 'Đã bú đủ tiêu chuẩn ngày, good job!';
        }

        $sleeps = Sleep
            ::where('start', '<=', $endOfDay)
            ->where('start', '>=', $startOfDay)
            ->get()
        ;

        $this->data['totalSleepHours'] = 0;
        foreach ($sleeps as $sleep) {
            $start = Carbon::parse($sleep->start);
            $end = Carbon::parse($sleep->end);
            $diff = $start->diffInMinutes($end) / 60;
            $this->data['totalSleepHours'] += $diff;
        }

        $this->data['standardSleepHours'] = config('app.standard_sleep_hours');
        if ($this->data['totalSleepHours'] < config('app.standard_sleep_hours')) {
            $this->data['sleepMessage'] = sprintf(
                'Ngủ ít quá, cần phải cho ngủ thêm %sh',
                config('app.standard_sleep_hours') - $this->data['totalSleepHours']
            );
        } else {
            $this->data['sleepMessage'] = 'Đã ngủ đủ thời gian yêu cầu, good job!';
        }

        return view(backpack_view('dashboard'), $this->data);
    }

    /**
     * Redirect to the dashboard.
     *
     * @return Redirector|RedirectResponse
     */
    public function redirect()
    {
        // The '/admin' route is not to be used as a page, because it breaks the menu's active state.
        return redirect(backpack_url('dashboard'));
    }
}
