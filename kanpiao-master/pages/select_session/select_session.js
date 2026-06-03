// pages/select_session/select_session.js// pages/buy/buy.js
var app = getApp();
Page({

  /**
   * 页面的初始数据
   */
  data: {
    show_id: "",
    show_detail: [],
    session_detail:[]
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad(options) {
    var that =  this;
    // 接受GET参数
    this.setData({
      show_id:options.show_id           //articleID问pageB页面变量
     })
    //  获取演出详情
     wx.request({
      url:  app.globalData.serverAddress +'function/wx/get_show_detail.php',
      method: 'GET',
      data: {
        show_id: that.data.show_id
      },
      header: {
        'Accept': 'application/json'
      },
      success: function (res) {
        // console.log(res.data);
        that.setData({
          show_detail:res.data
        })
      }
    })
    // 获取场次列表
    wx.request({
      url:  app.globalData.serverAddress +'function/wx/get_session_list.php',
      method: 'GET',
      data: {
        show_id: that.data.show_id
      },
      header: {
        'Accept': 'application/json'
      },
      success: function (res) {
        // console.log(res.data);
        that.setData({
          session_detail:res.data
        })
      }
    })
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady() {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow() {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide() {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload() {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh() {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom() {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage() {

  }
})