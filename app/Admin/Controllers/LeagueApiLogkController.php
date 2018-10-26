<?php

namespace App\Admin\Controllers;

use App\Models\LeagueApiLog;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class LeagueApiLogkController extends Controller
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
        $grid = new Grid(new LeagueApiLog);

        $grid->id('Id');
        $grid->provider_media_id('Provider media id');
        $grid->consumer_media_id('Consumer media id');
        $grid->scheme_id('Scheme id');
        $grid->batch('Batch');
        $grid->ip('Ip');
        $grid->user_agent('User agent');
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
        $show = new Show(LeagueApiLog::findOrFail($id));

        $show->id('Id');
        $show->provider_media_id('Provider media id');
        $show->consumer_media_id('Consumer media id');
        $show->scheme_id('Scheme id');
        $show->batch('Batch');
        $show->ip('Ip');
        $show->user_agent('User agent');
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
        $form = new Form(new LeagueApiLog);

        $form->number('provider_media_id', 'Provider media id');
        $form->number('consumer_media_id', 'Consumer media id');
        $form->number('scheme_id', 'Scheme id');
        $form->text('batch', 'Batch');
        $form->ip('ip', 'Ip');
        $form->text('user_agent', 'User agent');

        return $form;
    }
}
