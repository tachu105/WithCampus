<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- ユーザー名 -->
        <div>
            <x-input-label for="name" value="ユーザー名（団体名）" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- メールアドレス -->
        <div class="mt-4">
            <x-input-label for="email" value="メールアドレス" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- パスワード -->
        <div class="mt-4">
            <x-input-label for="password" value="パスワード" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- パスワード再確認 -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" value="パスワード再確認" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>



        <!-- 区切り線を挿入 -->
        <hr style="margin-top: 50px; margin-bottom: 50px;">


        <!-- アイコン画像 -->
        <div class="mt-4">
            <x-input-label for="icon_img" value="アカウント画像" />
            
            <div class="image" style="text-align: center; display: inline-block;">
                <img id="icon_img_preview" src="" alt="Image Preview" style="max-width: 150px; margin: 10px auto; display: none; border: 2px solid #aaa; padding: 0px;">
                <input type="file" name="icon_img" id="icon_img">
            </div>
        </div>

        <!-- 代表者名 -->
        <div class="mt-4">
            <x-input-label for="rep_name" value="代表者名" />
            <x-text-input id="rep_name" class="block mt-1 w-full" type="text" name="rep_name" :value="old('rep_name')" required autofocus />
            <x-input-error :messages="$errors->get('rep_name')" class="mt-2" />
        </div>

        <!-- 団体種別 -->
        <div class="mt-4">
            <x-input-label for="group_tag" value="団体種別"/>
            <select name="group_tag" id="group_tag" class="block mt-1 w-full" :value="old('group_tag')" required autofocus>
                <option value="1">サークル・学生団体 など（受託者）</option>
                <option value="2">企業・公共団体 など（委託者）</option>
            </select>
        </div>

        <!-- 大学名（条件付きで表示） -->
        <div id="belong_univ_name_field" class="mt-4 hidden">
            <x-input-label for="belong_univ_name" value="所属大学名（空欄可）" />
            <x-text-input id="belong_univ_name" class="block mt-1 w-full" type="text" name="belong_univ_name" :value="old('belong_univ_name')" />
            <x-input-error :messages="$errors->get('belong_univ_name')" class="mt-2" />
        </div>

        


        <div class="flex items-center justify-end" style="margin-top: 70px;">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('登録済のアカウントでログイン') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('新規登録') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<script>
document.addEventListener('DOMContentLoaded', function () { //ページ読み込み時に実行

    //グループタグに応じた入力項目の変更処理//
    const groupTagSelect = document.getElementById('group_tag');
    const universityField = document.getElementById('belong_univ_name_field');

    function toggleUniversityField() {
        // '1' を選択したときのみ大学名フィールドを表示
        universityField.style.display = groupTagSelect.value === '1' ? 'block' : 'none';
    }

    // 初期状態の設定
    toggleUniversityField();

    // group_tagの値の変更を監視して実行するメソッドを登録
    groupTagSelect.addEventListener('change', toggleUniversityField);


    

    //アイコン画像のプレビュー処理//
    const iconImg = document.getElementById("icon_img");
    const defaultIconURL = "https://res.cloudinary.com/dtt8m9uyo/image/upload/v1715514790/profile-default.512x511_fts1om.png"
    
    function showIconImg(){
        if (iconImg.files.length > 0) {
            const iconImgFile = iconImg.files[0];
            var reader = new FileReader();
    
            reader.onload = function(e) {
                icon_img_preview.src = e.target.result;
                icon_img_preview.style.display = "block";
            }
            reader.readAsDataURL(iconImgFile);
        } else {
            icon_img_preview.src = defaultIconURL; // ここにデフォルト画像のURLを指定
            icon_img_preview.style.display = "block";
        }        
    }

    showIconImg();

    iconImg.addEventListener('change', showIconImg);
   
})
</script>

