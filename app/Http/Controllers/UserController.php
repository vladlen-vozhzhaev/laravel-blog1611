<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function changeAvatar(Request $request){
        $path = Storage::putFile('public/usersAvatar', $request->file('userAvatar'));
        $user = User::where('id', auth()->user()->getAuthIdentifier())->first();
        $user->img = str_replace('public', 'storage', $path);
        $user->save();
        return redirect()->intended('/profile');
    }
    public function changeUserData(Request $request){
        $name = $request->name; // получаем input name="name"
        $lastname = $request->lastname; // получаем input name="lastname"
        $user = User::where('id', auth()->user()->getAuthIdentifier())->first(); // Получаем из БД пользователя с id авторизованного пользователя
        if(!empty($name)) {$user->name = $name;} // Если $name не пустой, тогда записываем новое значение name у пользователя
        if(!empty($lastname)) {$user->lastname = $lastname;} // Если $lastname не пустой, тогда записываем новое значение name у пользователя
        $user->save(); // Сохраняем изменения в БД
        return json_encode(['result'=>'success']); // отправляем ответ клиенту в формате JSON
    }
}
