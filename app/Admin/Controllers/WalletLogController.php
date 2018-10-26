<?php

namespace App\Admin\Controllers;

use App\Models\WalletLog;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class WalletLogController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WalletLog);

        $grid->id('Id');
        $grid->serial_number('Serial number');
        $grid->from_wallet_id('From wallet id');
        $grid->from_user_id('From user id');
        $grid->to_wallet_id('To wallet id');
        $grid->to_user_id('To user id');
        $grid->coin('Coin');
        $grid->wallet_log_category_id('Wallet log category id');
        $grid->unpaid('Unpaid');
        $grid->text('Text');
        $grid->remark('Remark');
        $grid->created_at('Created at');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(WalletLog::findOrFail($id));

        $show->id('Id');
        $show->serial_number('Serial number');
        $show->from_wallet_id('From wallet id');
        $show->from_user_id('From user id');
        $show->to_wallet_id('To wallet id');
        $show->to_user_id('To user id');
        $show->coin('Coin');
        $show->wallet_log_category_id('Wallet log category id');
        $show->unpaid('Unpaid');
        $show->text('Text');
        $show->remark('Remark');
        $show->created_at('Created at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new WalletLog);

        $form->text('serial_number', 'Serial number');
        $form->number('from_wallet_id', 'From wallet id');
        $form->number('from_user_id', 'From user id');
        $form->number('to_wallet_id', 'To wallet id');
        $form->number('to_user_id', 'To user id');
        $form->number('coin', 'Coin');
        $form->number('wallet_log_category_id', 'Wallet log category id');
        $form->number('unpaid', 'Unpaid');
        $form->text('text', 'Text');
        $form->text('remark', 'Remark');

        return $form;
    }
}
