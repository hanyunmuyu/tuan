<template>
    <div :class="cls[type]" :id="tag">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{{title}}</h4>
                </div>
                <div class="modal-body">
                    <p>{{tooltip}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">{{cancel}}</button>
                    <button type="button" class="btn btn-outline" @click="doOk">确定</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</template>

<script>
export default {
  name: 'Modal',
  props: ['title', 'type', 'tooltip', 'cancel', 'ok', 'tag'],
  data: function () {
    return {
      cls: {
        'default': ['modal', 'fade'],
        'primary': ['modal', 'fade', 'modal-primary'],
        'danger': ['modal', 'fade', 'modal-danger'],
        'info': ['modal', 'fade', 'modal-info'],
        'warning': ['modal', 'fade', 'modal-warning'],
        'success': ['modal', 'fade', 'modal-success']
      }
    }
  },
  methods: {
    doOk () {
      this.$emit('ok', () => this.doCancel())
    },
    doCancel () {
      $('.modal').modal('hide')
    }
  }
}
</script>

<style scoped>

</style>
