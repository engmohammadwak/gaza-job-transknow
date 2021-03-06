@extends('layouts.app')

@section('content')

    <main class="py-6">
        <div class="container mx-auto px-4">

            <div class="flex flex-wrap">
                {{--Start Employer detail--}}
                <div class="w-full lg:w-1/4">
                    <div class="bg-white rounded-lg border border-gray-300 shadow-lg">
                        <h2 class="rounded-t-lg text-gray-800 uppercase text-center tracking-wide text-xl font-semibold mb-2 py-2 bg-gray-100">
                            بيانات الشركة/المؤسسة
                        </h2>
                        <div class="px-2 py-4">
                            <div>
                                <div class="m-auto w-36 h-36 relative">
                                    <img class="rounded w-36 h-36"
                                         @if(!empty($employer->information->avatar))
                                         src="{{$employer->information->avatar}}"
                                         @else
                                         src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXp7vG6vsG3u77s8fTCxsnn7O/f5OfFyczP09bM0dO8wMPk6ezY3eDd4uXR1tnJzdBvAX/cAAACVElEQVR4nO3b23KDIBRA0ShGU0n0//+2KmO94gWZ8Zxmr7fmwWEHJsJUHw8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwO1MHHdn+L3rIoK6eshsNJ8kTaJI07fERPOO1Nc1vgQm2oiBTWJ+d8+CqV1heplLzMRNonED+4mg7L6p591FC+133/xCRNCtd3nL9BlxWP++MOaXFdEXFjZ7r8D9l45C8y6aG0cWtP/SUGhs2d8dA/ZfGgrzYX+TVqcTNRRO9l+fS5eSYzQs85psUcuzk6igcLoHPz2J8gvzWaH/JLS+95RfOD8o1p5CU5R7l5LkfKEp0mQ1UX7hsVXqDpRrifILD/3S9CfmlUQFhQfuFu0STTyJ8gsP3PH7GVxN1FC4t2sbBy4TNRTu7LyHJbqaqKFw+/Q0ncFloo7CjRPwMnCWqKXQZ75El4nKC9dmcJaou9AXOE5UXbi+RGeJygrz8Uf+GewSn9uXuplnWDZJ7d8f24F/s6iq0LYf9olbS3Q8i5oKrRu4S9ybwaQ/aCkqtP3I28QDgeoK7TBya/aXqL5COx67PTCD2grtdOwH+pQV2r0a7YVBgZoKwwIVFQYG6ikMDVRTGByopjD8ATcKb0UhhRTe77sKs2DV7FKSjId18TUEBYVyLhUThWfILHTDqmI85/2RWWjcE/bhP6OD7maT3h20MHsA47JC3PsW0wcwLhv9t0OOPOIkCn21y2bXXwlyylxiYMPk1SuCSmpfK8bNQvIrpAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwNX4BCbAju9/X67UAAAAASUVORK5CYII="
                                         @endif
                                         alt=""
                                    >
                                    <svg
                                        class="text-green-500 fill-current w-6 h-6 absolute bottom-0 left-0 -ml-2 -mb-2"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                              clip-rule="evenodd"></path>
                                        <title>حساب موثق</title>
                                    </svg>
                                </div>
                                <div class="text-xl mt-2">
                                    <div class="flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 25 25">
                                            <path fill="#2b3344"
                                                  d="M21.5,21H20V7.5A.49.49,0,0,0,19.66,7L16,5.47V21H15V3.5a.5.5,0,0,0-.5-.5h-9a.5.5,0,0,0-.5.5V21H3.5a.5.5,0,0,0,0,1h18a.5.5,0,0,0,0-1Zm-4-12h1a.5.5,0,0,1,.5.5.51.51,0,0,1-.5.5h-1a.51.51,0,0,1-.5-.5A.5.5,0,0,1,17.5,9Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3h1a.51.51,0,0,1,.5.5.5.5,0,0,1-.5.5h-1a.5.5,0,0,1-.5-.5A.51.51,0,0,1,17.5,15Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1ZM11,6h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1ZM7.94,6H9A.5.5,0,0,1,9,7h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm2.56,6V19h-1v2h-1V18.47A.5.5,0,0,1,9,18h2a.5.5,0,0,1,.5.5V21Z"></path>
                                        </svg>
                                        <span class="text-blue-500 mr-1">{{$employer->name}}</span>
                                    </div>
                                </div>
                                <div
                                    class="flex justify-center mt-2 font-semibold text-sm">{{$employer->information->category->name}}</div>
                            </div>

                            <hr class="my-2">
                            <div class="text-base rounded-lg font-semibold bg-gray-100">
                                <a href=""
                                   class="flex rounded py-2 hover:bg-gray-200 border-r-4 border-blue-900 text-blue-900">
                                    <span class="mr-1 w-full text-right px-4">عن الشركة/المؤسسة</span>
                                </a>
                                <hr>
                                <a href="{{route('job.index')}}" class="flex rounded py-2 hover:bg-gray-200">
                                    <span class="mr-1 w-full text-right px-4">الوظائف</span>
                                </a>
                                <hr>
                                <a href="{{route('training.index')}}" class="flex rounded py-2 hover:bg-gray-200">
                                    <span class="mr-1 w-full text-right px-4">التدريب</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                {{--End Employer detail--}}

                {{--Start Employer Description --}}
                <div class="w-full lg:w-3/4">
                    <div class="shadow-lg bg-white rounded-lg border border-gray-300 mt-6 lg:mt-0 lg:mr-8">
                        {{--Start Job Description--}}
                        <div class="rounded-t-lg text-gray-800 font-bold uppercase tracking-wide
                        text-lg font-semibold   bg-gray-100 flex justify-between items-center">
                            <h2 class="rounded-t-lg text-gray-800 font-bold uppercase tracking-wide text-lg font-semibold   py-2 px-6 bg-gray-100">
                                تعديل بيانات الشركة/المؤسسة
                            </h2>

                        </div>
                        <form action="{{route('employer.profile.update',auth()->guard('employer')->user())}}" enctype="multipart/form-data"
                              method="post">
                            @csrf

                            <div class="py-2 px-6 mb-2">
                                <h2 class="text-base font-semibold border-r-4 border-blue-900 pr-2">بيانات
                                    الشركة</h2>
                                <div class="">

                                    <div class="mt-2 text-justify">
                                        <div class="block my-2">
                                            <label for="">اسم الشركة/المؤسسة</label>
                                        </div>
                                        <input name="name"
                                               class="border border-gray-300 w-full  text-sm rounded-sm px-3 py-2 focus:outline-none focus:border-blue-900"
                                               placeholder="اسم الشركة/المؤسسة" value="{{$employer->name}}"
                                               type="text">
                                        @error('name')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('name') }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 text-justify">
                                        <div class="block my-2">
                                            <label for="">اسم المستخدم</label>
                                        </div>
                                        <input name="username"
                                               class="border border-gray-300 w-full  text-sm rounded-sm px-3 py-2 focus:outline-none focus:border-blue-900"
                                               placeholder="اسم المستخدم" value="{{$employer->username}}"
                                               type="text">
                                        @error('username')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('username') }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 text-justify">
                                        <div class="block my-2">
                                            <label for="">البريد الالكتروني</label>
                                        </div>
                                        <input name="email"
                                               class="border border-gray-300 w-full  text-sm rounded-sm px-3 py-2 focus:outline-none focus:border-blue-900"
                                               placeholder="البريد الالكتروني" value="{{$employer->email}}"
                                               type="text">
                                        @error('email')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('email') }}</span>
                                        @enderror
                                    </div>


                                    <div class="mt-2 text-justify">
                                        <div class="block my-2">
                                            <label for="">الصورة الشخصية</label>
                                        </div>
                                        <input name="avatar" class="border border-gray-300 w-full  text-sm rounded-sm px-3
                                    py-1.5 focus:outline-none focus:border-blue-900"
                                               placeholder="" value="{{$employer->email}}"
                                               type="file">
                                        @if(str_contains ( $employer->information->avatar ,'default.png' ) == false)
                                            <div class="p-3">
                                                <span> الصورة الحالية</span>
                                                <img src="{{$employer->information->avatar}}" class="w-32 h-32" alt="">
                                            </div>
                                        @endif
                                        @error('avatar')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('avatar') }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="my-4">

                                <div>
                                    <h2 class="text-base font-semibold border-r-4 border-blue-900 pr-2">تعديل كلمة المرور:</h2>
                                    <div class="mt-2 text-justify">
                                        <div class="block my-2">
                                            <label for="">كلمة المرور</label>
                                        </div>
                                        <input name="password"
                                               class="border border-gray-300 w-full  text-sm rounded-sm px-3 py-2 focus:outline-none focus:border-blue-900"
                                               placeholder="كلمة المرور"
                                               type="password">
                                        @error('password')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('password') }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 text-justify">
                                        <div class="block my-2">
                                            <label for="">تأكيد كلمة المرور</label>
                                        </div>
                                        <input type="password" name="password_confirmation"
                                               class="border border-gray-300 w-full  text-sm rounded-sm px-3 py-2 focus:outline-none focus:border-blue-900"
                                               placeholder="تأكيد كلمة المرور">
                                        @error('password_confirmation')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('password_confirmation') }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <hr class="my-4">

                                <div>
                                    <h2 class="text-base font-semibold border-r-4 border-blue-900 pr-2">من نحن:</h2>
                                    <div class="my-2">
                                    <textarea name="bio"
                                              class="border border-gray-300 w-full  text-sm rounded-sm px-3 py-1.5 focus:outline-none focus:border-blue-900"
                                              id="" cols="" rows="5">{{$employer->information->bio}}</textarea>
                                        @error('bio')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('bio') }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="my-4">
                                <h2 class="text-base font-semibold border-r-4 border-blue-900 pr-2">
                                    معلومات الشركة/المؤسسة
                                </h2>
                                <div class=" grid md:grid-cols-3 gap-5">
                                    <div class="mt-2 text-justify">
                                        <div class="block my-2">
                                            <label for="">المحافظات</label>
                                        </div>
                                        <select name="region" id="" class="border border-gray-300 w-full w-1/3 text-sm rounded-sm px-3
                                    py-1.5 focus:outline-none focus:border-blue-900">
                                            <option value="" selected disabled>إختر المحافظة</option>

                                            @foreach($regions as $region)
                                                <option value="{{$region->id}}"
                                                        @if($region->id == $employer->information->region->id) selected @endif>
                                                    {{$region->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('region')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('region') }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 text-justify">
                                        <div class="block my-2">
                                            <label for="">المجال</label>
                                        </div>
                                        <select name="category" id="" class="border border-gray-300 w-full w-1/3 text-sm rounded-sm px-3
                                    py-1.5 focus:outline-none focus:border-blue-900">
                                            <option value="" selected disabled>إختر المجال</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}"
                                                        @if($category->id == $employer->information->category->id) selected @endif>
                                                    {{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('category') }}</span>
                                        @enderror

                                    </div>
                                    <div class="mt-2 text-justify">
                                        <div class="block my-2">
                                            <label for="">نوع الشركة/المؤسسة</label>
                                        </div>
                                        <input name="type"
                                               class="border border-gray-300 w-full w-1/3 text-sm rounded-sm  px-3 py-2 focus:outline-none focus:border-blue-900"
                                               placeholder="نوع الشركة/المؤسسة" value="{{$employer->information->type}}"
                                               type="text">
                                        @error('type')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('type') }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 text-justify">
                                        <div class="block my-2">
                                            <label for="">تأسست عام</label>
                                        </div>
                                        <input name="year"
                                               class="border border-gray-300 w-full w-1/3 text-sm rounded-sm px-3 py-2  focus:outline-none focus:border-blue-900"
                                               placeholder="تأسست عام" value="{{$employer->information->year}}"
                                               type="text">
                                        @error('year')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('year') }}</span>
                                        @enderror
                                    </div>

                                    <div class="mt-2 text-justify">
                                        <div class="block my-2">
                                            <label for="">العنوان</label>
                                        </div>
                                        <input name="address"
                                               class="border border-gray-300 w-full w-1/3 text-sm rounded-sm px-3 py-2  focus:outline-none focus:border-blue-900"
                                               placeholder="العنوان" value="{{$employer->information->address}}"
                                               type="text">
                                        @error('phone')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('phone') }}</span>
                                        @enderror
                                    </div>

                                    <div class="mt-2 text-justify">
                                        <div class="block my-2">
                                            <label for="">رقم الهاتف</label>
                                        </div>
                                        <input name="phone"
                                               class="border border-gray-300 w-full w-1/3 text-sm rounded-sm px-3
                                             py-2  focus:outline-none focus:border-blue-900"
                                               placeholder="رقم الهاتف" value="{{$employer->information->phone}}"
                                               type="text">
                                        @error('phone')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('phone') }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="my-4">
                                <div>
                                    <h2 class="text-base font-semibold border-r-4 border-blue-900 pr-2">
                                        بيانات التواصل
                                    </h2>

                                    <div class="mt-2 text-justify">
                                        <div class="block my-2">
                                            <label for="">web</label>
                                        </div>
                                        <input name="web"
                                            class="border border-gray-300 w-full  text-sm rounded-sm px-3 py-1.5 focus:outline-none focus:border-blue-900"
                                            placeholder="web url" value="{{@$employer->socials->web}}"
                                            type="text">
                                        @error('web')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('web') }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 text-justify">
                                        <div class="block my-2">
                                            <label for="">linkedin</label>
                                        </div>
                                        <input name="linkedin"
                                            class="border border-gray-300 w-full  text-sm rounded-sm px-3 py-1.5 focus:outline-none focus:border-blue-900"
                                            placeholder="linkedin url" value="{{@$employer->socials->linkedin}}"
                                            type="text">
                                        @error('linkedin')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('linkedin') }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 text-justify">
                                        <div class="block my-2">
                                            <label for="">facebook</label>
                                        </div>
                                        <input name="facebook"
                                            class="border border-gray-300 w-full  text-sm rounded-sm px-3 py-1.5 focus:outline-none focus:border-blue-900"
                                            placeholder="facebook url" value="{{@$employer->socials->facebook}}"
                                            type="text">
                                        @error('facebook')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('facebook') }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 text-justify">
                                        <div class="block my-2">
                                            <label for="">twitter</label>
                                        </div>
                                        <input name="twitter"
                                            class="border border-gray-300 w-full text-sm rounded-sm px-3 py-1.5 focus:outline-none focus:border-blue-900"
                                            placeholder="twitter url" value="{{@$employer->socials->twitter}}"
                                            type="text">
                                        @error('twitter')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('twitter') }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 text-justify">
                                        <div class="block my-2">
                                            <label for="">instagram</label>
                                        </div>
                                        <input name="instagram"
                                            class="border border-gray-300 w-full  text-sm rounded-sm px-3 py-1.5 focus:outline-none focus:border-blue-900"
                                            placeholder="instagram url" value="{{@$employer->socials->instagram}}"
                                            type="text">
                                        @error('instagram')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('instagram') }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 text-justify">
                                        <div class="block my-2">
                                            <label for="">whatsapp</label>
                                        </div>
                                        <input name="whatsapp"
                                            class="border border-gray-300 w-full text-sm rounded-sm px-3 py-1.5 focus:outline-none focus:border-blue-900"
                                            placeholder="whatsapp url" value="{{@$employer->socials->whatsapp}}"
                                            type="text">
                                        @error('whatsapp')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('whatsapp') }}</span>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                            <div class="text-center my-5">
                                <button type="submit" class="bg-blue-900 text-sm text-white font-semibold rounded py-2 w-1/2 ml-2 hover:bg-white
                     hover:text-blue-900 border hover:border-white">
                                    حفظ
                                </button>
                            </div>
                        </form>
                    </div>
                    {{--End Single Description--}}
                </div>
            </div>
            {{--End Employer Description --}}
        </div>
        </div>
    </main>
@endsection
