@extends('homepage.master')
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb">
        <div class="container">
            <ul class="list-unstyled d-flex align-items-center m-0">
                <li><a href="/">Home</a></li>
                <li>
                    <svg class="icon icon-breadcrumb" width="64" height="64" viewBox="0 0 64 64" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.4">
                            <path
                                d="M25.9375 8.5625L23.0625 11.4375L43.625 32L23.0625 52.5625L25.9375 55.4375L47.9375 33.4375L49.3125 32L47.9375 30.5625L25.9375 8.5625Z"
                                fill="#000" />
                        </g>
                    </svg>
                </li>
                <li>Blog Details</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->

    <main id="MainContent" class="content-for-layout">
        <div class="article-page mt-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-12" v-for="value in dataPost">
                        <div class="article-rte">
                            <div class="article-img">
                                <img v-bind:src="value.hinh_anh" alt="img">
                            </div>
                            <div class="article-meta">
                                <h2 class="article-title">@{{ value.title }}</h2>
                                <div class="article-card-published text_14 d-flex align-items-center">
                                    <span class="article-author d-flex align-items-center">
                                        <span class="icon-author"><svg width="20" height="20" viewBox="0 0 15 17"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.5 0.59375C4.72888 0.59375 2.46875 2.85388 2.46875 5.625C2.46875 7.3573 3.35315 8.89587 4.69238 9.80274C2.12903 10.9033 0.3125 13.447 0.3125 16.4063H1.75C1.75 13.2224 4.31616 10.6563 7.5 10.6563C10.6838 10.6563 13.25 13.2224 13.25 16.4063H14.6875C14.6875 13.447 12.871 10.9033 10.3076 9.80274C11.6469 8.89587 12.5313 7.3573 12.5313 5.625C12.5313 2.85388 10.2711 0.59375 7.5 0.59375ZM7.5 2.03125C9.49341 2.03125 11.0938 3.63159 11.0938 5.625C11.0938 7.61841 9.49341 9.21875 7.5 9.21875C5.50659 9.21875 3.90625 7.61841 3.90625 5.625C3.90625 3.63159 5.50659 2.03125 7.5 2.03125Z"
                                                    fill="#00234D" />
                                            </svg>
                                        </span>
                                        <span class="ms-2 hover-red">@{{ value.last_name }}</span>
                                    </span>
                                    <span class="article-separator mx-3">
                                        <svg width="2" height="12" viewBox="0 0 2 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4" d="M1.09761 0.5H0V11.5H1.09761V0.5Z" fill="black" />
                                        </svg>
                                    </span>
                                    <a class="article-date d-flex align-items-center">
                                        <span class="icon-publish">
                                            <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.347656 0.5V15.5H7.53711L10.0977 18.0605L12.6582 15.5H19.8477V0.5H0.347656ZM1.84766 2H18.3477V14H12.0371L10.0977 15.9395L8.1582 14H1.84766V2ZM4.84766 4.25V5.75H15.3477V4.25H4.84766ZM4.84766 7.25V8.75H15.3477V7.25H4.84766ZM4.84766 10.25V11.75H12.3477V10.25H4.84766Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <span class="ms-2"> @{{ count }} Comments</span>
                                    </a>
                                    <span class="article-separator mx-3 d-none d-sm-block">
                                        <svg width="2" height="12" viewBox="0 0 2 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4" d="M1.09761 0.5H0V11.5H1.09761V0.5Z" fill="black" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="article-content">
                                <p>@{{ value.content }}</p>
                            </div>

                            <div class="comments-section mt-100 home-section overflow-hidden">
                                <div class="section-header">
                                    <h2 class="section-heading">Comments - @{{ count }}</h2>
                                </div>
                                <template v-for="(v,k) in dataCmt">
                                    <div class="comments-area">
                                        <div class="d-flex comments-item">

                                            <div class="comments-main">
                                                <div class="comments-main-content">
                                                    <div class="comments-meta">
                                                        <h4 class="commentator-name">@{{ v.name_user }}</h4>
                                                        <div class="comments-date article-date d-flex align-items-center">
                                                            <span class="icon-publish">
                                                                <svg width="17" height="18" viewBox="0 0 17 18"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M3.46875 0.875V1.59375H0.59375V17.4063H16.4063V1.59375H13.5313V0.875H12.0938V1.59375H4.90625V0.875H3.46875ZM2.03125 3.03125H3.46875V3.75H4.90625V3.03125H12.0938V3.75H13.5313V3.03125H14.9688V4.46875H2.03125V3.03125ZM2.03125 5.90625H14.9688V15.9688H2.03125V5.90625ZM6.34375 7.34375V8.78125H7.78125V7.34375H6.34375ZM9.21875 7.34375V8.78125H10.6563V7.34375H9.21875ZM12.0938 7.34375V8.78125H13.5313V7.34375H12.0938ZM3.46875 10.2188V11.6563H4.90625V10.2188H3.46875ZM6.34375 10.2188V11.6563H7.78125V10.2188H6.34375ZM9.21875 10.2188V11.6563H10.6563V10.2188H9.21875ZM12.0938 10.2188V11.6563H13.5313V10.2188H12.0938ZM3.46875 13.0938V14.5313H4.90625V13.0938H3.46875ZM6.34375 13.0938V14.5313H7.78125V13.0938H6.34375ZM9.21875 13.0938V14.5313H10.6563V13.0938H9.21875Z"
                                                                        fill="#00234D" />
                                                                </svg>
                                                            </span>
                                                            <span class="ms-2">@{{ formatDate(v.created_at) }}</span>
                                                        </div>
                                                        <p class="comments">@{{ v.noi_dung_cmt }}</p>
                                                        @if (Auth::guard('client')->check())
                                                            <button v-if="v.id_user == {{ Auth::guard('client')->id() }}"
                                                                v-on:click="deleteCMT(v.id)">delete comment</button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <div class="comment-form-area">
                                    <div class="form-header">
                                        <h4 class="form-title">Leave A Reply</h4>
                                        <input v-model="dataComment.id_post" class="form-control" hidden />
                                    </div>
                                    <div class="comment-form">
                                        <div class="field-item textarea-field">
                                            <span class="field-icon">
                                                <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0.25 0.75V14.25H4V18.0586L8.76367 14.25H19.75V0.75H0.25ZM1.75 2.25H18.25V12.75H8.23633L5.5 14.9385V12.75H1.75V2.25ZM5.5 6C4.6709 6 4 6.6709 4 7.5C4 8.3291 4.6709 9 5.5 9C6.3291 9 7 8.3291 7 7.5C7 6.6709 6.3291 6 5.5 6ZM10 6C9.1709 6 8.5 6.6709 8.5 7.5C8.5 8.3291 9.1709 9 10 9C10.8291 9 11.5 8.3291 11.5 7.5C11.5 6.6709 10.8291 6 10 6ZM14.5 6C13.6709 6 13 6.6709 13 7.5C13 8.3291 13.6709 9 14.5 9C15.3291 9 16 8.3291 16 7.5C16 6.6709 15.3291 6 14.5 6Z"
                                                        fill="#00234D" />
                                                </svg>
                                            </span>
                                            <textarea cols="20" rows="6" v-model="dataComment.noi_dung_cmt"
                                                placeholder="Write your comment here........"></textarea>
                                        </div>
                                        <button type="submit" class="position-relative review-submit-btn mt-4"
                                            v-on:click="createCmt()">SUBMIT</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-12">
                        <div class="filter-drawer blog-sidebar">
                            <div class="filter-widget">
                                <div class="filter-header faq-heading heading_18 d-flex align-items-center border-bottom">
                                    Latest Post
                                </div>
                                <div class="filter-related">
                                    <template v-for="(v,k) in lastest">
                                        <div class="related-item related-item-article d-flex">
                                            <div class="related-img-wrapper">
                                                <img class="related-img" v-bind:src="v.hinh_anh" alt="img">
                                            </div>
                                            <div class="related-product-info">
                                                <h2 class="related-heading text_14">
                                                    <a v-bind:href="'/blogDetailPage/'+v.id">@{{ v.title }}</a>
                                                </h2>
                                                <p class="article-card-published text_12 d-flex align-items-center mt-2">
                                                    <span class="article-date d-flex align-items-center">
                                                        <span class="icon-publish">
                                                            <svg width="17" height="18" viewBox="0 0 17 18"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M3.46875 0.875V1.59375H0.59375V17.4063H16.4063V1.59375H13.5313V0.875H12.0938V1.59375H4.90625V0.875H3.46875ZM2.03125 3.03125H3.46875V3.75H4.90625V3.03125H12.0938V3.75H13.5313V3.03125H14.9688V4.46875H2.03125V3.03125ZM2.03125 5.90625H14.9688V15.9688H2.03125V5.90625ZM6.34375 7.34375V8.78125H7.78125V7.34375H6.34375ZM9.21875 7.34375V8.78125H10.6563V7.34375H9.21875ZM12.0938 7.34375V8.78125H13.5313V7.34375H12.0938ZM3.46875 10.2188V11.6563H4.90625V10.2188H3.46875ZM6.34375 10.2188V11.6563H7.78125V10.2188H6.34375ZM9.21875 10.2188V11.6563H10.6563V10.2188H9.21875ZM12.0938 10.2188V11.6563H13.5313V10.2188H12.0938ZM3.46875 13.0938V14.5313H4.90625V13.0938H3.46875ZM6.34375 13.0938V14.5313H7.78125V13.0938H6.34375ZM9.21875 13.0938V14.5313H10.6563V13.0938H9.21875Z"
                                                                    fill="#00234D"></path>
                                                            </svg>
                                                            @{{ formatDate(v.created_at) }}
                                                        </span>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script>
        new Vue({
            el: '#MainContent',
            data: {
                postId: {{ $id }},
                dataPost: {},
                dataCmt: [],
                lastest: [],
                count: '',
                dataComment: {
                    noi_dung_cmt: '',
                    id_post: {{ $id }}
                }
            },
            created() {
                this.getPost();
                this.getLastpost()
                this.count
            },
            methods: {
                getPost() {
                    axios
                        .get('/test/showbaiviet/' + this.postId)
                        .then((res) => {
                            if (res.data.status) {
                                this.dataPost = res.data.data;
                                this.dataCmt = res.data.dataCMT;
                                this.count = res.data.countcmt;
                            }
                        });
                },
                getLastpost() {
                    axios
                        .get('/latestPost')
                        .then((res) => {
                            this.lastest = res.data.lastestPost;
                        })
                },
                createCmt() {
                    if (confirm('đăng cmt nha')) {
                        axios
                            .post('/test/cmt/', this.dataComment)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success('Bạn đã comment');
                                    this.dataComment.noi_dung_cmt = ''
                                    this.getPost();
                                }
                            })
                        .catch((res) => {
                            var danh_sach_loi = res.response.data.errors;
                            $.each(danh_sach_loi, function(key, value) {
                                toastr.error(value[0]);
                            });

                        })
                    }
                },
                deleteCMT(id) {
                    if (confirm('xóa cmt này ?')) {
                        axios
                            .get('/deleteComment/' + id)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success('xóa  comment');
                                    this.getPost();
                                }
                            });
                    }
                },
                formatDate(datetime) {
                    const input = datetime;
                    const dateObj = new Date(input);
                    const year = dateObj.getFullYear();
                    const month = (dateObj.getMonth() + 1).toString().padStart(2, '0');
                    const date = dateObj.getDate().toString().padStart(2, '0');
                    const result = `${date}/${month}/${year}`
                    return result;
                },
            }
        });
    </script>
@endsection
