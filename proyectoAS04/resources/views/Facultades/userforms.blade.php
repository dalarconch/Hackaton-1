@php
	$user = Auth::user();
	$idUser=$user->id;
	$rol=DB::table('role_user')
	      ->where('user_id', $idUser)
	      ->get()
	      ->first();
@endphp 