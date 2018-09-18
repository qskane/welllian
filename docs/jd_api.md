

https://oauth.jd.com/oauth/authorize?response_type=code&client_id=YOUR_CLIENT_ID&

redirect_uri=YOUR_REGISTERED_REDIRECT_URI&state=YOUR_CUSTOM_CODE


wap版，http请求需加参数view=wap。如下：

https://oauth.jd.com/oauth/authorize?response_type=code&client_id=YOUR_CLIENT_ID&

redirect_uri=YOUR_REGISTERED_REDIRECT_URI&state=YOUR_CUSTOM_CODE&view=wap

https://fun.fanli.com/goshop/go/?id=544&lc=shopdetail_goumai&v=1537257955017

https://union-click.jd.com/jdc? e=F03y68nk4itr047unubw &p=AyIPZRprFDJWWA1FBCVbV0IUWVALHFRBEwQAQB1AWQkrGVNfG3IvXQh3VhFQDEMSEkdMZ1NzDRkOfARUG1IJAxobVR9KFQAZAlQQWxIyEQRUH1gWAhYCZRlcHAYUN1UrWxQyWWlUK1olAhYFUhNTFAMSAFwSWiUFIlwAdV9GBkADARIPElEQBAErayUyIjdVG2sVMk1DCEY%3D                                                                      &t=W1dCFFlQCxxUQRMEAEAdQFkJ   &tracking_id=9181893452
https://union-click.jd.com/jdc? e=0                    &p=AyIHZRprEQMbD1YdXyVGTV8LRGtMR1dGXgVFTUdGW0pADgpQTFtLH1ocChEBUQQCUF5PNzNmInVYSQYIeSx3WnIFN04GbUIQBQMXV3sBEwdcB1odHhMERBtdHgcQDFAYaxUHEAdRE1sQBBE3VRpaFAoTD1QaWyUyEgZlTTUVAxMGVBpaFQEUN1UeXxQAGwZVHFolAhYFURJSFQcRBFEcXiUCEgFlQA57BxpSBxMJEAYQBVdICyUyFgZcE1gTBiI3ZStbJQEiWBFGBg%3D%3D&t=W1dCFBBFC1pXUwkEAEAdQFkJBV8UCxoEUx9ETEdOWg%3D%3D






























以JSONArray的字符串格式返回查询结果——
success：接口调用是否成功（1：成功，0：失败）; 
msg: 接口调用失败success为0时的信息描述; 
hasMore：是否还有数据(true：还有数据 false:已查询完毕，没有数据了); 
data：返回数据; 
orderId:订单ID; 
popId:商家ID; 
parentId:父单ID,父单拆分后,子单中parentId为父单的id; 
orderTime:下单时间; 
cosPrice:订单实际计算佣金使用金额; 
commission:佣金,如果是查询的引入订单接口，表示预估佣金；如果查询的是业绩订单接口，表示的是实际佣金; 
totalMoney:订单金额（会员价 包含优惠，不含运费,是各个商品会员价的总和); 
splitType:拆分类型固定为3; 
unionUserName:联盟的用户名 (需要联系运营开放白名单才能拿到数据); 
sourceEmt:下单设备 1.pc 2.无线; 
yn:订单取消标识，1买家未取消，0买家已取消; 
plus:是否plus会员 1是，0不是; 
balance: 1:已结算，2：未结算; 
skus: 返回的sku列表; 
skuId:商品ID; 
skuName:商品名称; 
wareId:款ID; 
skuNum:商品数量; 
skuReturnNum:商品退货数量; 
subUnionId:子联盟ID(需要联系运营开放白名单才能拿到数据); 
firstLevel:一级类目; 
secondLevel:二级类目; 
thirdLevel:三级类目; 
cosPrice:用于佣金计算的基础值; 
commission:佣金(cosPrice * commissionRate); 
commissionRate:佣金比例; 
subSideRate:分佣方的分佣比例(收入分成比例); 
subsidyRate:平台分成比例;
valid:sku是否有效字段,1:有效，2：无效;
positionId:推广位ID;
unionTrafficType:渠道来源，172：1号店；
validCode:无效码 1:有效,2:订单拆单,3:订单取消,4:京东帮帮主订单,5:账户异常,6:赠品类目,7:校园订单,8:企业订单,9:团购订单,10:开增值税专用发票订单,11:乡村推广员下单,12:自己推广自己下单,13:违规订单,14:订单来源与备案网址不符,-1:无效原因未知;
unionTag：联盟标签数据（整型的二进制字符串(32位)，目前只返回8位：00000001。数据从右向左进行，每一位为1表示符合联盟的标签特征，第1位：优惠券，第2位：组合推广订单，第3位：拼购订单，第4位：首次购订单。例如：00000001:优惠券，00000010:组合推广订单，00000100:拼购订单，00001000:首次购，00000111：优惠券+组合推广+拼购等）; 





