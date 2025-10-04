<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Enums\ThemeMode;
use Filament\Pages\Dashboard;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Auth\Pages\EditProfile;
use Filament\Widgets\FilamentInfoWidget;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class BorrowerPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        // dd(get_class_methods($panel));
        return $panel
            ->id('borrower')
            ->path('borrower')
            ->login()
            ->colors([
                'primary' => Color::Cyan,
                // 'gray' => Color::Red,
            ])
            ->discoverResources(in: app_path('Filament/Borrower/Resources'), for: 'App\Filament\Borrower\Resources')
            ->discoverPages(in: app_path('Filament/Borrower/Pages'), for: 'App\Filament\Borrower\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Borrower/Widgets'), for: 'App\Filament\Borrower\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            // ->profile()
            // ->simpleProfilePage(false)
            // ->spa()
            // ->spaUrlExceptions([
            //     url('/borrower/profile')
            // ])
            // ->unsavedChangesAlerts()
            // ->databaseTransactions()

            ->brandName('Book System')
            // ->brandLogo(function () {
            //     return view('logo');
            // })
            ->brandLogo(asset('images/book.png'))
            ->brandLogoHeight('3rem')
            ->favicon(asset('images/book.png'))
            // ->darkMode(false)
            // ->defaultThemeMode(ThemeMode::Dark)
            // ->darkModeBrandLogo(asset('images/book2.png'))
            // ->font('Poppins')
            
            // ->sidebarWidth('500px')
            // ->sidebarCollapsibleOnDesktop()
            // ->sidebarFullyCollapsibleOnDesktop()
            // ->navigation(false)
            // ->topNavigation()
            // ->topBar(false)
            ->breadcrumbs(false)
            ;
    }
}
