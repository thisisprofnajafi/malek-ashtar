<script setup lang="ts">

import {ref} from "vue";

const searchCont = ref<HTMLElement>()
const searchInput = ref<HTMLElement>()
const loginSignupButton = ref<HTMLElement>()
const sidebarOverlay = ref<HTMLElement>()
const sidebar = ref<HTMLElement>()

const proceedToSearch = () =>{
    console.log("hello yadvar")
    if(searchCont.value.classList.contains('active')){
        searchCont.value.classList.remove('active');
        searchInput.value.classList.remove('active')
    }else{
        searchCont.value.classList.add('active');
        searchInput.value.classList.add('active');
    }
    if(loginSignupButton.value.classList.contains('search')){
        loginSignupButton.value.classList.remove('search');
    }else{
        loginSignupButton.value.classList.add('search');
    }
}

const viewSideMenu = () =>{
    sidebar.value.classList.add('active')
    sidebarOverlay.value.classList.add('active')
}
const hideSideMenu = () =>{
    sidebar.value.classList.remove('active')
    sidebarOverlay.value.classList.remove('active')
}




</script>

<template>
    <div ref="sidebarOverlay" class="sidebar-overlay" @click="hideSideMenu"></div>
    <div ref="sidebar" class="sidebar">
        <button class="sidebar__button yad-i-btn"  @click="hideSideMenu">
            <ion-icon name="close-outline"></ion-icon>
        </button>
        <ul class="sidebar__list">
            <li class="sidebar__list--item active"><a href="#">خانه</a></li>
            <li class="sidebar__list--item"><a href="#">خاطرات</a></li>
            <li class="sidebar__list--item"><a href="#">خیرین</a></li>
            <li class="sidebar__list--item"><a href="#">یادواره ها</a></li>
            <li class="sidebar__list--item"><a href="#">مطالب</a></li>
        </ul>
    </div>
    <div class="desktop-nav">
        <div class="top-nav">
            <div class="date-time">
                <div class="date">12 اردیبهشت - 1403</div>
                <div class="time">12:45:00</div>
            </div>
            <div class="logo d-flex justify-content-center align-items-center">
                <img src="/images/logo.png">
            </div>
        </div>
        <div class="second-nav">
            <div class="left-actions">
                <div class="nav-buttons d-flex justify-content-start align-items-center gap-3">
                    <div class="search-cont" ref="searchCont">
                        <input ref="searchInput" class="search-input" type="text" placeholder="جستجو مطالب">
                        <button @click="proceedToSearch"  class="search d-flex justify-content-center align-items-center">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>
                    </div>
                    <button ref="loginSignupButton" class="login d-flex justify-content-center align-items-center gap-1">
                        <ion-icon name="person-add-outline"></ion-icon>
                        <span>ورود / عضویت</span>
                    </button>
                </div>
            </div>
            <div class="main-nav">
                <button class="menu-icon d-flex justify-content-center align-items-center" @click="viewSideMenu">
                    <ion-icon name="menu-outline"></ion-icon>
                </button>
                <ul class="nav-list d-flex align-items-center justify-content-end is-flex-direction-row-reverse gap-3.5">
                    <li class="nav-item"><a href="#">خانه</a></li>
                    <li class="nav-item"><a href="#">خاطرات</a></li>
                    <li class="nav-item"><a href="#">خیرین</a></li>
                    <li class="nav-item"><a href="#">یادواره ها</a></li>
                    <li class="nav-item"><a href="#">مطالب</a></li>
                </ul>
            </div>
        </div>
    </div>
</template>
<style lang="scss">
@import "../../scss/abstracts/mixins";
//.desktop-nav {
//    color: var(--ma-light-secondary);
//    background: linear-gradient(109.6deg, rgb(0, 204, 130) 11.2%, rgb(58, 181, 46) 91.7%);
//    //box-shadow: 0 1px 10px 1px rgba(0,0,0,0.2);
//    box-shadow: var(--light-box-shadow-md);
//    margin-bottom: 1rem;
//
//    .actions {
//        font-family: vazir, serif;
//        padding: 0 5rem;
//        @include media_for_md {
//            padding: 0 1rem;
//        }
//        width: 100%;
//        height: 10vh;
//
//        .login, .search, .menu-icon {
//            background: #3dd28d;
//            color: #fff;
//            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
//            padding: 0.5rem 1rem;
//            font-size: 1.1rem;
//            border-radius: 2rem;
//
//            ion-icon {
//                font-size: 1.5rem;
//                @include media_for_md {
//                    font-size: 1.2rem;
//                    padding: 0.2rem;
//                }
//            }
//
//            @include media_for_md {
//                padding: 0.4rem;
//
//                span {
//                    display: none;
//                }
//            }
//        }
//
//        .search, .menu-icon {
//            padding: 0.5rem;
//        }
//
//        .menu-icon {
//            @include media_for_xl {
//                display: none;
//            }
//            @include media_for_lg {
//                display: none;
//            }
//            @include media_for_md {
//                display: flex;
//            }
//        }


//        .nav-list {
//            gap: 1rem;
//
//            @include media_for_lg {
//                gap: 0.5rem;
//            }
//            @include media_for_md {
//                display: none;
//            }
//
//            .nav-item {
//                font-size: 1.2rem;
//                font-weight: 700;
//                transition: all .3s;
//                background: #3dd28d00;
//                cursor: pointer;
//                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0), 0 1px 2px 0 rgba(0, 0, 0, 0);
//                padding: 0.5rem 1.5rem;
//                border-radius: 2rem;
//
//                a {
//                    &:hover {
//                        color: #fff;
//                    }
//                }
//
//                &:hover {
//                    background: #3dd28d;
//                    color: #fff;
//                    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
//
//                }
//            }
//
//        }
//
//        .logo {
//            width: 5rem;
//            height: 5rem;
//        }
//    }
//}

</style>
