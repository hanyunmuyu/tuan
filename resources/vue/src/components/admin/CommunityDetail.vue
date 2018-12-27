<template>
    <div>
        <div v-if="true" class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" :src="community.community_logo">
                        <h3 class="profile-username text-center">{{community.community_name}}</h3>

                        <p class="text-muted text-center">{{community}}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>成员</b> <a class="pull-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>活动</b> <a class="pull-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>粉丝</b> <a class="pull-right">13,287</a>
                            </li>
                            <li class="list-group-item">
                                <b>动态</b> <a class="pull-right">13,287</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">详情</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i>描述</strong>

                        <p class="text-muted">
                            这里是社团描述
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i>所属院校</strong>

                        <p class="text-muted">河南工业大学</p>

                        <hr>

                        <strong><i class="fa fa-tag margin-r-5"></i>标签、分类</strong>

                        <p>
                            <span class="label label-success">音乐</span>
                            <span class="label label-info">美术</span>
                            <span class="label label-warning">编程</span>
                            <span class="label label-primary">体育</span>
                        </p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i></strong>

                        <p>写点备注</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">动态</a></li>
                        <li><a href="#timeline" data-toggle="tab">活动</a></li>
                        <li><a href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <div v-for="index in 10" class="post" :key="index">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="/static/logo.png" alt="user image">
                                    <span class="username">
                                        <a href="#">李云龙</a>
                                    </span>
                                    <span class="description">发布时间：{{new Date()}}</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore the hate as they create awesome
                                    tools to help create filler text for everyone from bacon lovers
                                    to Charlie Sheen fans.
                                </p>
                                <ul class="list-inline">
                                    <li>
                                        <span class="link-black text-sm">
                                            <i class="fa fa-share margin-r-5"></i>
                                            分享（100）
                                        </span>
                                    </li>
                                    <li>
                                        <span class="link-black text-sm">
                                            <i class="fa fa-thumbs-o-up margin-r-5"></i>
                                            点赞（1000）
                                        </span>
                                    </li>
                                    <li class="pull-right">
                                        <a class="link-black text-sm">
                                            <i class="fa fa-comments-o margin-r-5"></i>
                                            评论（50）
                                        </a>
                                    </li>
                                </ul>
                                <button type="button" class="btn btn-danger"><i class="fa fa-remove"></i>删除</button>
                                <button type="button" class="btn btn-warning"><i class="fa fa-warning"></i>禁用</button>
                                <button type="button" class="btn btn-primary"><i class="fa fa-thumbs-up"></i>置顶</button>
                            </div>
                            <div class="row">
                                <div class="align-content-center">
                                    <Pagination :total-page=10 :url="$route.fullPath"></Pagination>
                                </div>
                            </div> <!-- /.post -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                        <!-- The timeline -->
                        <ul class="timeline timeline-inverse">
                            <!-- timeline time label -->
                            <li class="time-label">
                            <span class="bg-red">
                              10 Feb. 2014
                            </span>
                            </li>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <li>
                                <i class="fa fa-envelope bg-blue"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                    <div class="timeline-body">
                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                        quora plaxo ideeli hulu weebly balihoo...
                                    </div>
                                    <div class="timeline-footer">
                                        <a class="btn btn-primary btn-xs">Read more</a>
                                        <a class="btn btn-danger btn-xs">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <li>
                                <i class="fa fa-user bg-aqua"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                                    <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your
                                        friend request
                                    </h3>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <li>
                                <i class="fa fa-comments bg-yellow"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post
                                    </h3>

                                    <div class="timeline-body">
                                        Take me to your leader!
                                        Switzerland is small and neutral!
                                        We are more like Germany, ambitious and misunderstood!
                                    </div>
                                    <div class="timeline-footer">
                                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                    </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline time label -->
                            <li class="time-label">
                            <span class="bg-green">
                              3 Jan. 2014
                            </span>
                            </li>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <li>
                                <i class="fa fa-camera bg-purple"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                    <div class="timeline-body">
                                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                                    </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            <li>
                                <i class="fa fa-clock-o bg-gray"></i>
                            </li>
                        </ul>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="settings">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                <div class="col-sm-10">
                                        <textarea class="form-control" id="inputExperience"
                                                  placeholder="Experience"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> I agree to the <a href="#">terms and
                                            conditions</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <div v-else>

    </div>
    </div>
</template>

<script>
import {getCommunityDetail} from '../../service'
import Pagination from '../widget/Pagination'

export default {
  name: 'CommunityDetail',
  components: {Pagination},
  data () {
    return {
      'community': {},
      lastPage: 10,
      currentPage: 1
    }
  },
  methods: {
    getDetail () {
      let id = this.$route.query.id
      getCommunityDetail({id: id}).then((v) => {
        this.community = v
      })
    }
  },
  mounted () {
    this.getDetail()
  },
  watch: {
    $route (to, from) {
      this.getDetail()
    }
  },
  comments: {Pagination},
  template: '<Pagination/>'
}
</script>

<style scoped>

</style>
