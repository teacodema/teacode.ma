<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\BookInterviewRequest;

class ActionController extends Controller
{
    public function getActions(Request $request)
    {
        try {
            $data = new \stdClass;
            $data->title = 'TeaCode | Actions';
            $menu = json_decode(\File::get(base_path() . '/database/data/admin/menu.json'));
            $actions = getActions();
            return view('pages.admin.index', ['actions' => $actions, 'menu' => $menu, 'data' => $data]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function calendar(Request $request)
    {
        $data = new \stdClass;
        $data->title = 'TeaCode | Calendar';
        $menu = json_decode(\File::get(base_path() . '/database/data/admin/menu.json'));
        return view('pages.admin.calendar', ['data' => $data, 'menu' => $menu]);
    }

    public function getEvents(Request $request)
    {
        try {
            $data = new \stdClass;
            $data->title = 'TeaCode | Events list';
            $menu = json_decode(\File::get(base_path() . '/database/data/admin/menu.json'));
            $events = Event::orderBy('start_date', 'desc')->get();
            return view('pages.admin.events', ['events' => $events, 'menu' => $menu, 'data' => $data]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getEvent(Request $request, Event $event)
    {
        try {
            $menu = json_decode(\File::get(base_path() . '/database/data/admin/menu.json'));
            $actions = getActions();
            $data = new \stdClass;
            $data->title = $event->title;
            return view('pages.admin.index', ['data' => $data, 'actions' => $actions, 'event' => $event, 'menu' => $menu]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function addEvent(Request $request)
    {
        try {
            $data = $request->all();
            if (isset($data['extended_props']) && $data['extended_props']) {
                $extended_props = [];
                foreach ($data['extended_props'] as $prop) {
                    $x = str_replace('\n', '\\n', $prop[1]);
                    $extended_props[$prop[0]] = $x;
                }
            }
            if ($data['end_date']) {
                $data['end_date'] = \Carbon\Carbon::createFromFormat('Y-m-d', $data['end_date']);
            }
            if (key_exists('days_of_week', $data) && $data['days_of_week'] != null) {
                $data['days_of_week'] = array_map(function ($i) {
                    return (int)$i;
                }, explode(',', $data['days_of_week']));
                $event = Event::create([
                    'start_time' =>  $data['start_time'],
                    'end_time' => $data['end_time'],
                    'start_date' => \Carbon\Carbon::createFromFormat('Y-m-d', $data['start_date']),
                    'end_date' => $data['end_date'],
                    'background_color' => $data['background_color'],
                    'text_color' => $data['text_color'],
                    'days_of_week' => $data['days_of_week'],
                    'url' => $data['url'],
                    'title' => $data['title'],
                    'is_private' => isset($data['is_private']) ? 1 : 0,
                    'extended_props' => isset($extended_props) ? json_decode(json_encode($extended_props)) : null
                ]);
            } else {
                $event = Event::create([
                    'start_time' =>  $data['start_time'],
                    'end_time' => $data['end_time'],
                    'start_date' => \Carbon\Carbon::createFromFormat('Y-m-d', $data['start_date']),
                    'end_date' => $data['end_date'],
                    'background_color' => $data['background_color'],
                    'text_color' => $data['text_color'],
                    'days_of_week' => null,
                    'url' => $data['url'],
                    'title' => $data['title'],
                    'is_private' => isset($data['is_private']) ? 1 : 0,
                    'extended_props' => isset($extended_props) ? json_decode(json_encode($extended_props)) : null
                ]);
            }
            return redirect('/admin/events/' . $event->id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateEvent(Request $request, Event $event)
    {
        try {
            $data = $request->all();
            if ($request->has('extended_props')) {
                $extended_props = [];
                foreach ($data['extended_props'] as $prop) {
                    $x = str_replace('\n', '\\n', $prop[1]);
                    $extended_props[$prop[0]] = $x;
                }
            }
            if (key_exists('days_of_week', $data) && $data['days_of_week'] != null) {
                $data['days_of_week'] = array_map(function ($i) {
                    return (int)$i;
                }, explode(',', $data['days_of_week']));
                $event->update([
                    'start_time' =>  $data['start_time'] ?? $event->start_time,
                    'end_time' => $data['end_time'] ?? $event->end_time,
                    'start_date' => $data['start_date'] ? \Carbon\Carbon::createFromFormat('Y-m-d', $data['start_date']) : $event->start_date,
                    'end_date' => $data['end_date'] ? \Carbon\Carbon::createFromFormat('Y-m-d', $data['end_date']) : $event->end_date,
                    'background_color' => $data['background_color'],
                    'text_color' => $data['text_color'],
                    'days_of_week' => $data['days_of_week'],
                    'url' => $data['url'],
                    'title' => $data['title'],
                    'is_private' => isset($data['is_private']) ? true : false,
                    'extended_props' => isset($extended_props) ? json_decode(json_encode($extended_props)) : null
                ]);
            } else {
                $event->update([
                    'start_time' =>  $data['start_time'] ?? $event->start_time,
                    'end_time' => $data['end_time'] ?? $event->end_time,
                    'start_date' => $data['start_date'] ? \Carbon\Carbon::createFromFormat('Y-m-d', $data['start_date']) : $event->start_date,
                    'end_date' => $data['end_date'] ? \Carbon\Carbon::createFromFormat('Y-m-d', $data['end_date']) : $event->end_date,
                    'background_color' => $data['background_color'] == '#000000' ? null : $data['background_color'],
                    'text_color' => $data['text_color'] == '#000000' ? null : $data['text_color'],
                    'days_of_week' => null,
                    'url' => $data['url'],
                    'title' => $data['title'],
                    'is_private' => isset($data['is_private']) ? true : false,
                    'extended_props' => isset($extended_props) ? json_decode(json_encode($extended_props)) : null
                ]);
            }
            return ['event' => $event];
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroyEvent(Request $request, Event $event)
    {
        try {
            $event->delete();
            return ['event' => $event];
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getAssets(Request $request, $type)
    {
        try {
            $base_path = base_path();
            try {
                $path = public_path() . '/../../assets/shared/img/' . $type;
                $_base_path = str_replace('base', '', $base_path);
                $files = \File::files($path);
            } catch (\Throwable $th) {
                $path = public_path() . '/assets/shared/img/' . $type;
                $_base_path = $base_path . '\public\\';
                $files = \File::files($path);
            }
            foreach ($files as $file) {
                $file->webPath = str_replace($_base_path, '', $file->getRealPath());
            }
            $menu = json_decode(\File::get($base_path . '/database/data/admin/menu.json'));
            $data = new \stdClass;
            $data->title = 'Assets';
            return view('pages.admin.assets', ['data' => $data, 'files' => $files, 'menu' => $menu]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
