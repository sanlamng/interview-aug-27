import {BadRequestException, Body, Controller, Get, HttpStatus, Post, Req, Res, UnauthorizedException} from '@nestjs/common';
import {AppService} from './app.service';
import * as bcrypt from 'bcrypt';
import {JwtService} from "@nestjs/jwt";
import {Response, Request} from 'express';

@Controller('api')
export class AppController {
    constructor(
        private readonly appService: AppService,
        private jwtService: JwtService
    ) {
    }

    @Post('register')
    async register(
        @Body('name') name: string,
        @Body('email') email: string,
        @Body('dob') dob: string,
        @Body('telephone') telephone: string,
        @Body('product') product: string,
        @Body('amountpaid') amountpaid: string,
        @Body('dateofpayment') dateofpayment: string,
        @Body('password') password: string
    ) {
        const hashedPassword = await bcrypt.hash(password, 12);

        const user = await this.appService.create({
            name,
            email,
            dob,
            telephone,
            product,
            amountpaid,
            dateofpayment,
            password: hashedPassword
        });

        delete user.password;

        return user;
    }

    @Post('login')
    async login(
        @Body('username') username: string,
        @Body('password') password: string,
        @Res({passthrough: true}) response: Response
    ) {
        const name = username;
        const user = await this.appService.findOne({name});

        if (!user) {
            throw new BadRequestException('invalid credentials');
        }

        if (!await bcrypt.compare(password, user.password)) {
            throw new BadRequestException('invalid credentials');
        }

        const jwt = await this.jwtService.signAsync({id: user.id});

        response.cookie('jwt', jwt, {httpOnly: true});

        return {
            statusCode: HttpStatus.OK,
            message: 'success',
            jwt: jwt,

        };
    }

    @Get('user')
    async user(
        @Req() request: Request,) {
        try {
            const cookie = request.cookies['jwt'];

            const data = await this.jwtService.verifyAsync(cookie);

            if (!data) {
                throw new UnauthorizedException();
            }

            const user = await this.appService.findOne({id: data['id']});

            const {password, ...result} = user;

          
            return {
                status: true,
                statusCode: HttpStatus.OK,
                data: result,
    
            };

        } catch (e) {
            throw new UnauthorizedException();
        }
    }

    @Post('logout')
    async logout(@Res({passthrough: true}) response: Response) {
        response.clearCookie('jwt');

        return {
            message: 'success'
        }
    }
}
